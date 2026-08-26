@extends('site::layouts.app')

@section('title', 'How It Works')
@section('description', 'Take a guided tour or launch your own private CoogsNation Marketplace demo.')

@section('content')

<section class="ngf-demo-landing">

    <div class="shell shell--wide">

        <div class="ngf-demo-hero">

            <div class="ngf-section__eyebrow">
                COOGSNATION MARKETPLACE
            </div>

            <h1>
                See how it works.<br>
                Then try it yourself.
            </h1>

            <p class="ngf-demo-hero__lead">
                Browse the Marketplace freely, or launch a private
                temporary demo filled with sample listings, sellers,
                messages, offers and marketplace activity.
            </p>

            <div class="ngf-demo-hero__actions">

                <a
                    href="#quick-tour"
                    class="button button--secondary button--large"
                >
                    Quick Tour
                </a>

                <form
                    method="POST"
                    action="{{ route('demo.prepare') }}"
                    class="ngf-demo-start-form"
                >
                    @csrf

                    <input
                        type="hidden"
                        name="redirect_to"
                        value="/"
                    >

                    <button
                        type="submit"
                        class="button button--primary button--large"
                    >
                        Launch Live Demo
                    </button>
                </form>

            </div>

            <div class="ngf-demo-note">
                <strong>Private sandbox.</strong>
                Demo activity is isolated from the real Marketplace
                and automatically expires.
            </div>

        </div>


        <section
            id="quick-tour"
            class="ngf-demo-tour"
        >

            <div class="ngf-section__eyebrow">
                QUICK TOUR
            </div>

            <h2>
                Everything a member needs to know.
            </h2>

            <div class="ngf-demo-tour__grid">

                <article class="ngf-demo-step">
                    <span>01</span>
                    <h3>Browse</h3>
                    <p>
                        Search listings or open any category.
                        No account is required just to browse.
                    </p>
                </article>

                <article class="ngf-demo-step">
                    <span>02</span>
                    <h3>Open a Listing</h3>
                    <p>
                        View photos, description, price,
                        seller information and listing details.
                    </p>
                </article>

                <article class="ngf-demo-step">
                    <span>03</span>
                    <h3>Save & Follow</h3>
                    <p>
                        Signed-in members can save listings,
                        favorite sellers and return later.
                    </p>
                </article>

                <article class="ngf-demo-step">
                    <span>04</span>
                    <h3>Talk to the Seller</h3>
                    <p>
                        Use the Marketplace's own private
                        buyer/seller conversation system.
                    </p>
                </article>

                <article class="ngf-demo-step">
                    <span>05</span>
                    <h3>Make an Offer</h3>
                    <p>
                        Negotiate through the offer system
                        when a listing supports offers.
                    </p>
                </article>

                <article class="ngf-demo-step">
                    <span>06</span>
                    <h3>Sell Something</h3>
                    <p>
                        Create a listing with category,
                        description, price, photos and video.
                    </p>
                </article>

            </div>

        </section>


        <section class="ngf-demo-launch">

            <div>

                <div class="ngf-section__eyebrow">
                    READY?
                </div>

                <h2>
                    Get your own temporary Marketplace.
                </h2>

                <p>
                    The demo behaves like the real application,
                    but its database is isolated and disposable.
                </p>

            </div>

            <form
                method="POST"
                action="{{ route('demo.prepare') }}"
            >
                @csrf

                <input
                    type="hidden"
                    name="redirect_to"
                    value="/"
                >

                <button
                    type="submit"
                    class="button button--primary button--large"
                >
                    Try Live Demo
                </button>
            </form>

        </section>

    </div>

</section>

@endsection
