<main id="main" class="site-main home-main business-main">
    {{-- <div class="site-banner" {{$home_banner}}> --}}
    <div class="site-banner">
        <div class="container ">
            <div class="site-banner__content">
                <h1 class="site-banner__title">
                    <mark>{{ Auth()->user()->name }}</mark>
                </h1>

                <p>
                    {!! Auth()->user()->linkedin !!}
                </p>

                {{-- <span class="">
                    {!! Auth()->user()->bio !!}
                </span> --}}
            </div>
        </div>
    </div>

    <div class="container">
        <div class="total-action">
            <ul class="grid columns-4 columns-md-2">
                <li class="bookings">
                    <div class="entry-detail">
                        <h3 class="entry-title">Startup Views</h3>
                        <span class="entry-number">{{ $amounts['views'] }}</span>
                    </div>
                </li>

                <li class="places">
                    <div class="entry-detail">
                        <h3 class="entry-title">Invites Sent</h3>
                        <span class="entry-number">{{ $amounts['invites'] }}</span>
                    </div>
                </li>

                <li class="reviews">
                    <div class="entry-detail">
                        <h3 class="entry-title">Intros Received</h3>
                        <span class="entry-number">{{ $amounts['intros'] }}</span>
                    </div>
                </li>

                <li class="views">
                    <div class="entry-detail">
                        <h3 class="entry-title">Total Raising</h3>
                        <span class="entry-number">
                            {{ '$' .number_format( $amounts['raising'], 0, ".", "," ) }}
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="trending trending-business">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9 col-lg-9">
                    <div class="d-flex" style="justify-content: space-between;">
                        <div>
                            <h2 class="title">{{__('My Startups 🚀')}}</h2>
                        </div>

                        <div>
                            <span id="list" class="mr-2 home-list">
                                <i class="las la-bars ml-2 la-20"></i>
                            </span>

                            <span  id="grid" class="home-grid">
                                <i class="las la-th-large ml-2 la-20"></i>
                            </span>
                        </div>
                    </div>

                    <div class="trending-startups mb-5 pb-5">
                        <div class="" data-item="4" data-arrows="true" data-itemScroll="4" data-dots="true" data-centerPadding="30" data-tabletitem="2" data-tabletscroll="2" data-smallpcscroll="3" data-smallpcitem="3" data-mobileitem="1" data-mobilescroll="1" data-mobilearrows="false">
                            @foreach($startups as $startup)
                                @include('frontend.startup.list_edit', ['startup' => $startup, 'featured' => false])
                            @endforeach
                        </div>
                    </div>

                    <h1 class="mt-5 mb-1">
                        Perks and Resources
                    </h1>

                    <p>
                        Loyal companies benefit from access to a number of perks and resources
                    </p>

                    <p>
                        If you would like to contribute to the list please reach out to Jose at filipe@fundraise.vc.
                    </p>

                    <div class="testimonial-item mt-5">
                        <div class="image">
                            <img src="{{ asset('assets/images/perks/digitalocean.webp') }}" alt="Digital Ocean">
                        </div>
                        <div class="testimonial-main-content">
                            <div class="content-wrap">
                                <div class="content">
                                    Digital Ocean provides developers, startups, and SMBs with cloud infrastructure-as-a-service platforms.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item mt-5">
                        <div class="image">
                            <img src="{{ asset('assets/images/perks/zendesk.webp') }}" alt="Zendesk">
                        </div>
                        <div class="testimonial-main-content">
                            <div class="content-wrap">
                                <div class="content">
                                    Zendesk is a service-first CRM company with support, sales, and customer engagement products designed to improve customer relationships
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item mt-5">
                        <div class="image">
                            <img src="{{ asset('assets/images/perks/stripe-atlas.webp') }}" alt="Stripe Atlas">
                        </div>
                        <div class="testimonial-main-content">
                            <div class="content-wrap">
                                <div class="content">
                                    Stripe Atlas helps entrepreneurs set up their company in a reliable, safe, and fast way from anywhere in the world.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item mt-5">
                        <div class="image">
                            <img src="{{ asset('assets/images/perks/notion.png') }}" alt="Notion">
                        </div>
                        <div class="testimonial-main-content">
                            <div class="content-wrap">
                                <div class="content">
                                    Notion is a single space where you can think, write, and plan. Capture thoughts, manage projects, or even run an entire company — and do it exactly the way.
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="testimonial-item t2">
                        <div class="image">
                            <img src="{{ asset('assets/images/avatars/female-2.jpg') }}" alt="female-2">
                        </div>
                        <div class="testimonial-main-content">
                            <div class="content-wrap">
                                <div class="content">
                                    <h3 class="text">
                                        Fundraise.vc is a fundraising platform designed for entrepreneurs and startups to quickly raise capital from VCs. The founders of Fundraise.vc are experts in the fields of investment, financial technology and entrepreneurship.
                                    </h3>
                                </div>
                                <div class="info">
                                    <div class="cite">
                                        Sam Hansson, Founder & CEO
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="col-xs-12 col-md-3 col-lg-3 trending-investors">
                    <h4 class="sub-title">{{__('Last Investors')}}</h4>

                    <div class="box mt-4">
                        @foreach($investors as $investor)
                        <div class="rosy-pink mb-3">
                            {{-- <span class="" style="color:#475569;"></span> --}}

                            <p class="" style="color:#475569;">
                                @php $investor_name = explode(' ', $investor->name); @endphp
                                {{ $investor_name[0] }}
                                @if(isset($investor_name[1]))
                                    {{ substr( $investor_name[1], 0, 1) }}.
                                @endif
                            </p>

                            @php
                                $colors = [
                                    'Private Equity' => '#30AADD',
                                    'Venture Capital' => '#43919B',
                                    'Corporate Venture Capital' => '#247881',
                                    'Venture Capital' => '#0A4D68',
                                    'Fund of Funds' => '#05BFDB',
                                    'Angel' => '#27E1C1',
                                    'Angel Syndicate' => '#B46060',
                                ]
                            @endphp

                            <span class="badge badge-secondary" style="background-color: {{ !isset($colors[$investor->type_investor]) ?: $colors[$investor->type_investor] }}">
                                {{ $investor->type_investor }}
                            </span>

                            <p class="small">
                                <span class="place" style="color:#64748b;">
                                    {{$investor->ticket}} - {{$investor->stage}}
                                </span>
                            </p>
                        </div>
                        @endforeach
                    </div>

                    <hr aria-orientation="horizontal" class="divider">
                </div>
            </div>
        </div>
    </div>
</main>
