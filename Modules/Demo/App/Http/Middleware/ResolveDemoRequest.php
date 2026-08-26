<?php

declare(strict_types=1);

namespace Modules\Demo\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Modules\Demo\App\Support\DemoSchemaManager;

class ResolveDemoRequest
{
    public function __construct(private readonly DemoSchemaManager $demoSchemaManager) {}

    public function handle(Request $request, Closure $next)
    {
        /*
         * NGF opt-in demo architecture.
         *
         * Normal Marketplace traffic never touches the demo engine.
         * A request enters demo mode only when it carries the NGF
         * demo cookie or already belongs to a demo session.
         */

        $cookieName = (string) config(
            'demo.cookie_name',
            'oc2_demo'
        );

        $demoUuid = $request->cookie($cookieName);

        $hasDemoSession = (bool) $request
            ->session()
            ->get('is_demo_session');

        /*
         * No demo identity at all:
         * this is ordinary production Marketplace traffic.
         */
        if (blank($demoUuid) && ! $hasDemoSession) {
            return $next($request);
        }

        /*
         * Enable demo services only for this visitor/request.
         */
        config(['demo.enabled' => true]);

        if ($this->shouldUsePublicSchema($request)) {
            $this->demoSchemaManager->activatePublic();

            return $next($request);
        }

        $instance = $this->demoSchemaManager
            ->findActiveInstance($demoUuid);

        $shouldForgetCookie =
            filled($demoUuid) && ! $instance;

        if (! $instance) {
            $this->resetDemoSession($request);
            $this->demoSchemaManager->activatePublic();

            $response = $next($request);

            if ($shouldForgetCookie) {
                Cookie::queue(
                    Cookie::forget($cookieName)
                );
            }

            return $response;
        }

        if (
            ! $hasDemoSession
            && $this->hasAuthSession($request)
        ) {
            Auth::guard('web')->logout();
        }

        $this->demoSchemaManager
            ->activateDemo($instance);

        $request->session()->put([
            'demo_uuid' => $instance->uuid,
            'is_demo_session' => true,
            'demo_expires_at' =>
                $instance->expires_at?->toIso8601String(),
        ]);

        return $next($request);
    }

    private function resetDemoSession(Request $request): void
    {
        if (! $request->session()->has('demo_uuid') && ! (bool) $request->session()->get('is_demo_session')) {
            return;
        }

        if ($this->hasAuthSession($request)) {
            Auth::guard('web')->logout();
        }

        $request->session()->forget([
            'demo_uuid',
            'is_demo_session',
            'demo_expires_at',
        ]);
    }

    private function hasAuthSession(Request $request): bool
    {
        return filled($request->session()->get(Auth::guard('web')->getName()));
    }

    private function shouldUsePublicSchema(Request $request): bool
    {
        if ($request->is('admin', 'admin/*')) {
            return true;
        }

        if (! $request->is('livewire/*')) {
            return false;
        }

        $refererPath = parse_url((string) $request->headers->get('referer', ''), PHP_URL_PATH) ?: '';

        return str_starts_with($refererPath, '/admin');
    }
}
