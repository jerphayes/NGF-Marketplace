@extends('site::layouts.app')

@section('title', 'CoogsNation Marketplace')
@section('description', 'Buy, sell, trade and connect in the CoogsNation Marketplace — an NGF Productions experience.')

@section('content')

<section class="ngf-marketplace-hero">
    <div class="shell shell--wide">
        <div class="ngf-marketplace-hero__grid">

            <div class="ngf-marketplace-hero__copy">

                <h1 class="ngf-marketplace-hero__title">
                    <span>COOGSNATION</span>
                    <strong>MARKETPLACE</strong>
                </h1>

                <p class="ngf-marketplace-hero__lead">
                    Buy. Sell. Trade. Connect.
                </p>

                <p class="ngf-marketplace-hero__sublead">
                    A fan-to-fan marketplace powered by NGF Productions.
                </p>

                <div class="ngf-marketplace-hero__actions">
                    <a
                        href="{{ route('listings.index') }}"
                        class="button button--primary button--large"
                    >
                        Browse Listings
                    </a>

                    <a
                        href="{{ auth()->check() ? route('panel.listings.create') : route('login') }}"
                        class="button button--secondary button--large"
                    >
                        Post Listing
                    </a>
                </div>

                <div class="ngf-marketplace-stats">

                    <div class="ngf-marketplace-stat">
                        <strong>{{ number_format($listingCount) }}</strong>
                        <span>Active Listings</span>
                    </div>

                    <div class="ngf-marketplace-stat">
                        <strong>{{ number_format($categoryCount) }}</strong>
                        <span>Categories</span>
                    </div>

                    <div class="ngf-marketplace-stat">
                        <strong>{{ number_format($userCount) }}</strong>
                        <span>Members</span>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>


<div class="shell shell--wide page">

    <div class="stack stack--section">

        @if($categories->isNotEmpty())

        <section class="section ngf-section">

            <div class="section__head">
                <div>
                    <div class="ngf-section__eyebrow">
                        EXPLORE THE MARKET
                    </div>

                    <h2 class="title-section">
                        Trending Categories
                    </h2>
                </div>

                <a
                    href="{{ route('categories.index') }}"
                    class="text-link"
                >
                    View All Categories
                </a>
            </div>

            <div class="grid grid--categories">

                @foreach($categories->take(12) as $category)

                    <a
                        href="{{ route('listings.index', ['category' => $category->getKey()]) }}"
                        class="category-card ngf-category-card"
                    >

                        <span class="category-card__icon">

                            @if($category->iconUrl())

                                <img
                                    src="{{ $category->iconUrl() }}"
                                    alt=""
                                    loading="lazy"
                                >

                            @else

                                <x-ui.icon name="grid"/>

                            @endif

                        </span>

                        <span class="category-card__name">
                            {{ $category->getAttribute('name') }}
                        </span>

                    </a>

                @endforeach

            </div>

        </section>

        @endif


        @if($featuredListings->isNotEmpty())

        <section class="section ngf-section">

            <div class="section__head">
                <div>
                    <div class="ngf-section__eyebrow">
                        SPOTLIGHT
                    </div>

                    <h2 class="title-section">
                        Featured Marketplace
                    </h2>
                </div>

                <a
                    href="{{ route('listings.index', ['sort' => 'relevance']) }}"
                    class="text-link"
                >
                    View All
                </a>
            </div>

            <div class="grid grid--listings">

                @foreach($featuredListings as $listing)

                    <x-ui.listing-card
                        :listing="$listing"
                        :favorited="in_array(
                            (int) $listing->getKey(),
                            $favoriteListingIds,
                            true
                        )"
                    />

                @endforeach

            </div>

        </section>

        @endif


        <section class="section ngf-section">

            <div class="section__head">
                <div>

                    <div class="ngf-section__eyebrow">
                        FRESH TO MARKET
                    </div>

                    <h2 class="title-section">
                        Latest Listings
                    </h2>

                </div>

                <a
                    href="{{ route('listings.index', ['sort' => 'newest']) }}"
                    class="text-link"
                >
                    Browse All
                </a>
            </div>


            @if($recentListings->isNotEmpty())

                <div class="grid grid--listings">

                    @foreach($recentListings as $listing)

                        <x-ui.listing-card
                            :listing="$listing"
                            :favorited="in_array(
                                (int) $listing->getKey(),
                                $favoriteListingIds,
                                true
                            )"
                        />

                    @endforeach

                </div>

            @else

                <div class="ngf-marketplace-empty">

                    <x-ui.icon name="tag"/>

                    <h3>
                        The marketplace is ready.
                    </h3>

                    <p>
                        Be the first member to post a listing.
                    </p>

                    <a
                        href="{{ auth()->check()
                            ? route('panel.listings.create')
                            : route('login') }}"
                        class="button button--primary"
                    >
                        Post First Listing
                    </a>

                </div>

            @endif

        </section>


        <section class="ngf-marketplace-cta">

            <div>

                <div class="ngf-section__eyebrow">
                    HAVE SOMETHING TO SELL?
                </div>

                <h2>
                    Turn your gear into somebody else's find.
                </h2>

                <p>
                    Post equipment, merchandise, memorabilia,
                    electronics, tickets and more.
                </p>

            </div>

            <div class="ngf-marketplace-cta__actions">

                <a
                    href="{{ auth()->check()
                        ? route('panel.listings.create')
                        : route('login') }}"
                    class="button button--primary button--large"
                >
                    Post Listing
                </a>

                <a
                    href="{{ route('promotions.plans') }}"
                    class="button button--secondary button--large"
                >
                    Featured Listing Options
                </a>

            </div>

        </section>

    </div>

</div>

@endsection
