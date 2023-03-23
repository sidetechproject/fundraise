@php
    $img_home_banner = getImageUrl(setting('home_banner'));
    if (setting('home_banner')) {
        $home_banner = "style=background-image:url({$img_home_banner})";
    } else {
        $home_banner = "style=background-image:url(/assets/images/home-bsn-banner.jpg)";
    }
@endphp

@extends('frontend.layouts.template_02')

@section('main')
    <main id="main" class="site-main home-main business-main">
        {{-- <div class="site-banner" {{$home_banner}}> --}}
        <div class="site-banner">
            <div class="container ">
                <div class="site-banner__content">
                    <h1 class="site-banner__title">
                        <mark>Fundraising</mark> made easy
                    </h1>

                    @php
                    $strings = [
                        'We help to accelerate the flow of capital to pre-seed, seed and series <br> A funding rounds as efficiently and quickly as possible.',
                        'We are a marketplace connecting venture capitalists and entrepreneurs. <br> A fast and easy way to start investing in startups you believe in.',
                        'We make it easy to provide critical capital to the startups and venture funds you believe in. <br> A fast and easy way to get started.'
                    ];
                    $copy = array_rand($strings);
                    @endphp
                    <p>
                        {!! $strings[$copy] !!}
                    </p>

                    {{-- <p>
                        <i>{{$city_count}}</i> {{__('cities')}}, <i>{{$category_count}}</i> {{__('categories')}}, <i>{{$place_count}}</i> {{__('places')}}.
                    </p> --}}

                    {{-- <form action="{{route('page_search_listing')}}" class="site-banner__search layout-02">
                        <div class="field-input">
                            <label for="input_search">{{__('Find')}}</label>
                            <input class="site-banner__search__input open-suggestion" id="input_search" type="text" placeholder="{{__('Ex: fastfood, beer')}}" autocomplete="off">
                            <input type="hidden" name="category[]" id="category_id">
                            <div class="search-suggestions category-suggestion">
                                <ul>
                                    <li><a href="#"><span>{{__('Loading...')}}</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="field-input">
                            <label for="location_search">{{__('Where')}}</label>
                            <input class="site-banner__search__input open-suggestion" id="location_search" type="text" placeholder="{{__('Your city')}}" autocomplete="off">
                            <input type="hidden" id="city_id">
                            <div class="search-suggestions location-suggestion">
                                <ul>
                                    <li><a href="#"><span>{{__('Loading...')}}</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="field-submit">
                            <button><i class="las la-search la-24-black"></i></button>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
        <!-- .site-banner -->

        <div class="trending trending-business">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-9 col-lg-9">
                        <div class="d-flex" style="justify-content: space-between;">
                            <div>
                                <h2 class="title">{{__('Trending Startups 🔥')}}</h2>
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

                        <div class="trending-startups">
                            <div class="" data-item="4" data-arrows="true" data-itemScroll="4" data-dots="true" data-centerPadding="30" data-tabletitem="2" data-tabletscroll="2" data-smallpcscroll="3" data-smallpcitem="3" data-mobileitem="1" data-mobilescroll="1" data-mobilearrows="false">

                                @foreach($trending_places as $place)
                                    @php
                                        $link_startup = route('place_detail', $place->slug);
                                    @endphp

                                    <div class="place-item layout-02">
                                        <div class="place-inner">
                                            <div class="place-thumb">
                                                <a class="entry-thumb" href="{{ $link_startup }}">
                                                    @if($place->thumb)
                                                        <img src="{{getImageUrl($place->thumb)}}" alt="{{$place->name}}">
                                                    @else
                                                        <img src="{{ asset('assets/images/favicon.png') }}" alt="Logo">
                                                    @endif
                                                </a>
                                                {{-- <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist @if($place->wish_list_count) remove_wishlist active @else @guest open-login @else add_wishlist @endguest @endif" data-id="{{$place->id}}">
                                                    <span class="icon-heart">
                                                        <i class="la la-bookmark large"></i>
                                                    </span>
                                                </a> --}}

                                            </div>


                                            <div class="entry-detail">

                                                <div class="desc">
                                                    <h3 class="place-title">
                                                        <a href="{{ $link_startup }}" style="color: #475569">
                                                            {{$place->name}}

                                                            @if($loop->index == 0)
                                                                <svg class="star" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" >
                                                                    <path d="M11.143 5.143A4.29 4.29 0 0 1 6.857.857a.857.857 0 0 0-1.714 0A4.29 4.29 0 0 1 .857 5.143a.857.857 0 0 0 0 1.714 4.29 4.29 0 0 1 4.286 4.286.857.857 0 0 0 1.714 0 4.29 4.29 0 0 1 4.286-4.286.857.857 0 0 0 0-1.714Z"></path>
                                                                </svg>
                                                            @endif

                                                            {!! $place->verified ? '<span class="badge badge-verified ml-3">Verified</span>' : '' !!}
                                                        </a>
                                                    </h3>

                                                    <div class="place-desc">
                                                        @php
                                                            $out = strlen($place->short_description) > 140 ? substr($place->short_description, 0, 140)."..." : $place->short_description;
                                                            echo $out;
                                                        @endphp
                                                    </div>

                                                    <div class="entry-head">
                                                        @foreach($place['place_types'] as $type)
                                                            <div class="place-type list-item">
                                                                <span>{{$type->name}}</span>
                                                            </div>
                                                        @endforeach

                                                        @if(isset($place['categories'][0]))
                                                            <div class="place-type list-item">
                                                                <span>{{$place['categories'][0]['name']}}</span>
                                                            </div>
                                                        @endif

                                                        <div class="place-city">
                                                            <span>{{ $place['stage'] }}</span>
                                                        </div>

                                                        <div class="place-city">
                                                            <span>{{ $place['address'] }}</span>
                                                        </div>

                                                        <div class="place-city">
                                                            <span>{{ $place['foundation'] }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="fav">
                                                    <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist @if($place->wish_list_count) remove_wishlist active @else @guest open-login @else add_wishlist @endguest @endif" data-id="{{$place->id}}">
                                                        <span class="icon-heart">
                                                            {{-- <i class="la la-check-double large"></i> --}}
                                                            <i class="la la-bookmark large"></i>
                                                        </span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <h4 class="mt-5 mb-5">
                            <a href="{{ route('page_search_listing') }}" class="text-dark text-black">
                                All Startups <i class="las la-arrow-right ml-2 la-20"></i>
                            </a>
                        </h4>

                        <h1 class="mt-5 mb-5">
                            Our customers love us
                        </h1>

                        <div class="testimonial-item">
                            <div class="image">
                                <img src="{{ asset('assets/images/avatars/female-3.jpg') }}" alt="female-2">
                            </div>
                            <div class="testimonial-main-content">
                                <div class="content-wrap">
                                    <div class="content">
                                        <h3 class="text">
                                            We see a lot of fundraising platforms, but the companies we see from Fundraise.vc are consistently the most prepared and polished. The platform provides clear steps for each part of the fundraising process, offering guidance before, during, and after funding events.
                                        </h3>
                                    </div>
                                    <div class="info">
                                        <div class="cite">
                                            Annie Metzger, CEO
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-item t2">
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
                        </div>


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
                                        'Private Equity' => '#7AA874',
                                        'Venture Capital' => '#AA77FF',
                                        'Corporate Venture Capital' => '#EBB02D',
                                        'Venture Capital' => '#D864A9',
                                        'Fund of Funds' => '#62CDFF',
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

                        <h4 class="sub-title">{{__('Category')}}</h4>

                        <div class="box mt-4">
                            @foreach($categories as $cat)
                                <div class="rosy-pink mb-3">
                                    <a href="{{route('page_search_listing', ['category[]' => $cat->id])}}">
                                        <span class="title" style="color:#475569;">{{$cat->name}}</span>
                                        <span class="place" style="color:#64748b;">{{$cat->place_count}} {{__('Startups')}}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .trending -->



        {{-- <div class="featured-cities">
            <div class="container">
                <h2 class="title title-border-bottom align-center">{{__('Featured Cities')}}<span>{{__("Choose the city you'll be living in next")}}</span></h2>
                <div class="slick-sliders">
                    <div class="slick-slider featured-slider slider-pd30" data-item="4" data-arrows="true" data-itemScroll="4" data-dots="true" data-centerPadding="30" data-tabletitem="2" data-tabletscroll="2" data-mobileitem="1" data-mobilescroll="1" data-mobilearrows="false">

                        @foreach($popular_cities as $city)
                            <div class="slick-item">
                                <div class="cities__item hover__box">
                                    <div class="cities__thumb hover__box__thumb">
                                        <a title="London" href="{{route('page_search_listing', ['city[]' => $city->id])}}">
                                            <img src="{{getImageUrl($city->thumb)}}" alt="{{$city->name}}">
                                        </a>
                                    </div>
                                    <h4 class="cities__name">{{$city['country']['name']}}</h4>
                                    <div class="cities__info">
                                        <h3 class="cities__capital">{{$city->name}}</h3>
                                        <p class="cities__number">{{$city->places_count}} {{__('places')}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="place-slider__nav slick-nav">
                        <div class="place-slider__prev slick-nav__prev">
                            <i class="las la-angle-left"></i>
                        </div>
                        <div class="place-slider__next slick-nav__next">
                            <i class="las la-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- .featured-cities -->

        {{-- <div class="business-about" style="background-image: url({{asset('assets/images/img_about_1.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="business-about-info">
                            <h2>{{__('Who we are')}}</h2>
                            <p>{{__("Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident.")}}</p>
                            <a href="#" class="btn">{{__('Read more')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- .business-about -->

        {{-- <div class="testimonial">
            <div class="container">
                <h2 class="title title-border-bottom align-center">{{__('People Talking About Us')}}</h2>
                <div class="slick-sliders">
                    <div class="slick-slider testimonial-slider slider-pd30" data-item="2" data-arrows="true" data-itemScroll="2" data-dots="true" data-centerPadding="30" data-tabletitem="1" data-tabletscroll="1" data-mobileitem="1" data-mobilescroll="1" data-mobilearrows="false">
                        @foreach($testimonials as $item)
                            <div class="testimonial-item layout-02">
                                <div class="avatar">
                                    <img class="ava" src="{{getImageUrl($item->avatar)}}" alt="Avatar">
                                    <img src="{{asset('assets/images/quote-active.png')}}" alt="Quote" class="quote">
                                </div>
                                <div class="testimonial-info">
                                    <p>{{$item->content}}</p>
                                    <div class="testimonial-meta">
                                        <b>{{$item->name}}</b>
                                        <span>{{$item->job_title}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="place-slider__nav slick-nav">
                        <div class="place-slider__prev slick-nav__prev">
                            <i class="las la-angle-left"></i>
                        </div>
                        <div class="place-slider__next slick-nav__next">
                            <i class="las la-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- .testimonial -->

        {{-- <div class="blogs">
            <div class="container">
                <h2 class="title title-border-bottom align-center">{{__('From Our Blog')}}</h2>
                <div class="news__content">
                    <div class="row">

                        @foreach($blog_posts as $post)
                            <div class="col-md-4">
                                <article class="post hover__box">
                                    <div class="post__thumb hover__box__thumb">
                                        <a title="{{$post->title}}" href="{{route('post_detail', [$post->slug, $post->id])}}"><img src="{{getImageUrl($post->thumb)}}" alt="{{$post->title}}"></a>
                                    </div>
                                    <div class="post__info">
                                        <ul class="post__category">
                                            @foreach($post['categories'] as $cat)
                                                <li><a title="{{$cat->name}}" href="{{route('post_list', $cat->slug)}}">{{$cat->name}}</a></li>
                                            @endforeach
                                        </ul>
                                        <h3 class="post__title"><a title="{{$post->title}}" href="{{route('post_detail', [$post->slug, $post->id])}}">{{$post->title}}</a></h3>
                                    </div>
                                </article>
                            </div>
                        @endforeach

                    </div>
                    <div class="align-center button-wrap"><a href="{{route('post_list_all')}}" class="btn btn-border">{{__('View more')}}</a></div>
                </div>
            </div>
        </div> --}}
    </main><!-- .site-main -->
@stop


@push('scripts')
    <script>
        $('#grid').click(function(){
            $('.place-item').addClass('grid');
        });

        $('#list').click(function(){
            $('.place-item').removeClass('grid');
        });
    </script>
@endpush
