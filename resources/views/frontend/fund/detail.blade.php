@extends('frontend.layouts.template_02')
@section('main')
    <main id="main" class="site-main place-04">
        <div class="site-banner" style="height: 120px !important;">
            <div class="container ">
                <div class="site-banner__content">


                    {{-- <h1 class="site-banner__title">
                        {{__('Fundraising made easy')}}
                    </h1>

                    <p>
                        {{__('Invest in innovative venture funds and startups validated by fundraise.vc')}}
                    </p> --}}

                    {{-- <p>
                        <i>{{$city_count}}</i> {{__('cities')}}, <i>{{$category_count}}</i> {{__('categories')}}, <i>{{$startup_count}}</i> {{__('places')}}.
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

        <div class="place">
            <div class="slick-sliders">
                <div class="slick-slider photoswipe hidden" data-item="1" data-arrows="false" data-itemScroll="1" data-dots="false" data-infinite="false" data-centerMode="false" data-centerPadding="0">
                    @if(isset($startup->gallery))
                        @foreach($startup->gallery as $gallery)
                            <div class="place-slider__item photoswipe-item">
                                <a href="{{getImageUrl($gallery)}}" data-height="900" data-width="1200" data-caption="{{$gallery}}">
                                    <img src="{{getImageUrl($gallery)}}" alt="{{$gallery}}">
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="place-slider__item"><a href="#"><img src="https://via.placeholder.com/1280x500?text=GOLO" alt="slider no image"></a></div>
                    @endif
                </div>

                {{-- <div class="place-share">
                    <a title="Save" href="#" class="add-wishlist @if($startup->wish_list_count) remove_wishlist active @else @guest open-login @else add_wishlist @endguest @endif" data-id="{{$startup->id}}">
                        <i class="la la-bookmark la-24"></i>
                    </a>
                    <a title="Share" href="#" class="share">
                        <i class="la la-share-square la-24"></i>
                    </a>
                    <div class="social-share">
                        <div class="list-social-icon">
                            <a class="facebook" href="#" onclick="window.open('https://www.facebook.com/sharer.php?u=' + window.location.href,'popUpWindow','height=550,width=600,left=200,top=100,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');">
                                <i class="la la-facebook"></i>
                            </a>
                            <a class="twitter" href="#" onclick="window.open('https://twitter.com/share?url=' + window.location.href,'popUpWindow','height=500,width=550,left=200,top=100,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');">
                                <i class="la la-twitter"></i>
                            </a>
                            <a class="linkedin" href="#" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=' + window.location.href,'popUpWindow','height=550,width=600,left=200,top=100,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');">
                                <i class="la la-linkedin"></i>
                            </a>
                            <a class="pinterest" href="#" onclick="window.open('https://pinterest.com/pin/create/button/?url=' + window.location.href,'popUpWindow','height=500,width=550,left=200,top=100,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');">
                                <i class="la la-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div> --}}
                <!-- .place-share -->

                <!-- .place-item__photo -->
                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                    <!-- Background of PhotoSwipe.
                           It's a separate element as animating opacity is faster than rgba(). -->
                    <div class="pswp__bg"></div>
                    <!-- Slides wrapper with overflow:hidden. -->
                    <div class="pswp__scroll-wrap">
                        <!-- Container that holds slides.
                              PhotoSwipe keeps only 3 of them in the DOM to save memory.
                              Don't modify these 3 pswp__item elements, data is added later on. -->
                        <div class="pswp__container">
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                        </div>
                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                        <div class="pswp__ui pswp__ui--hidden">
                            <div class="pswp__top-bar">
                                <!--  Controls are self-explanatory. Order can be changed. -->
                                <div class="pswp__counter"></div>
                                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                <button class="pswp__button pswp__button--share" title="Share"></button>
                                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                                <!-- element will get class pswp__preloader--active when preloader is running -->
                                <div class="pswp__preloader">
                                    <div class="pswp__preloader__icn">
                                        <div class="pswp__preloader__cut">
                                            <div class="pswp__preloader__donut"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                <div class="pswp__share-tooltip"></div>
                            </div>
                            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                            </button>
                            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                            </button>
                            <div class="pswp__caption">
                                <div class="pswp__caption__center"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- .pswp -->
            </div><!-- .place-slider -->

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mt-4">
                        @if(isStartupFromCurrentUser($startup))
                            <a href="{{ route('home') }}" class="text-dark text-black">
                                <i class="las la-arrow-left ml-2 la-20"></i> Back
                            </a>
                        @else
                            <a href="{{ route('page_search_listing') }}" class="text-dark text-black">
                                <i class="las la-arrow-left ml-2 la-20"></i> Back to all Startups
                            </a>
                        @endif

                        <div class="place__left">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="place-thumb">
                                        @if($startup->thumb && hasAccessToSeeStartup($startup))
                                            <img src="{{getImageUrl($startup->thumb)}}" alt="{{$startup->name}}" class="logo">
                                        @else
                                            <img src="{{ asset('assets/images/favicon.png') }}" alt="Logo" class="logo">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-9">

                                    <div class="place__box place__box--npd">
                                        <h1>
                                            @if(hasAccessToSeeStartup($startup))
                                                {{ $startup->name }}
                                            @else
                                                {{$startup['categories'][0]['name']}} raising {{ $startup->stage }}
                                            @endif
                                        </h1>

                                        <div class="place__meta">
                                            <div class="address">
                                                {{-- Foundation at {{$startup->foundation}} --}}
                                            </div>
                                        </div><!-- .place__meta -->

                                        <div class="place-gallery text-left">
                                            @if($startup->website)
                                                @if(hasAccessToSeeStartup($startup))
                                                    <a href="{{$startup->website}}" target="_blank" rel="nofollow" class="lity-btn">
                                                        Visit Website <i class="las la-external-link-alt ml-2 la-20"></i>
                                                    </a>
                                                @else
                                                    <a href="/billing" target="_blank" rel="nofollow" class="lity-btn">
                                                        Visit Website <i class="las la-lock ml-2 la-20"></i>
                                                    </a>
                                                @endif
                                            @endif

                                            <a href="{{route('fund_startups', $startup->slug)}}" title="{{$startup->name}}" class="lity-btn">
                                                Startups
                                                <i class="la la-rocket ml-2 la-20"></i>
                                            </a>

                                            @if($startup->deck)
                                                @if(hasAccessToSeeStartup($startup))
                                                    <a href="{{$startup->deck}}" target="_blank" rel="nofollow" class="lity-btn">
                                                        View Deck <i class="las la-external-link-alt ml-2 la-20"></i>
                                                    </a>
                                                @else
                                                    <a href="/billing" target="_blank" rel="nofollow" class="lity-btn">
                                                        View Deck <i class="las la-lock ml-2 la-20"></i>
                                                    </a>
                                                @endif
                                            @endif
                                            @if($startup->video)
                                                @if(hasAccessToSeeStartup($startup))
                                                    <a title="Video" href="{{$startup->video}}" data-lity class="lity-btn">
                                                        {{__('Video')}}
                                                        <i class="la la-youtube ml-2 la-20"></i>
                                                    </a>
                                                @else
                                                    <a href="/billing" target="_blank" rel="nofollow" class="lity-btn">
                                                        Video <i class="las la-lock ml-2 la-20"></i>
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                    </div><!-- .place__box -->
                                </div>
                            </div>

                            <div class="place__box place__box-overview">

                                <h3>{{__('Overview')}}</h3>

                                @if(hasAccessToSeeStartup($startup))
                                    <div class="place__desc open">
                                        @php
                                            echo $startup->description;
                                        @endphp
                                    </div>
                                @else
                                    <div class="place__desc open ">
                                        <span class="blur">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita placeat magni deserunt minima, sint ullam dolore non quo aliquam quibusdam excepturi provident fuga impedit culpa cumque odit soluta in laudantium.
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita placeat magni deserunt minima, sint ullam dolore non quo aliquam quibusdam excepturi provident fuga impedit culpa cumque odit soluta in laudantium.
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita placeat magni deserunt minima, sint ullam dolore non quo aliquam quibusdam excepturi provident fuga impedit culpa cumque odit soluta in laudantium.
                                        </span>
                                        <span class="small">{!! hasAccessToSeeStartup($startup) ? $opening['value'] : '<a href="/billing" class="text-dark"><i class="las la-lock la-20"></i> Upgrade to unlock</a>' !!}</span>
                                    </div>
                                @endif
                                {{-- <a href="#" class="show-more" title="{{__('Show more')}}">{{__('Show more')}}</a> --}}
                            </div>

                            <div class="place__box place__box-overview">
                                <h3>{{__('Investor   ')}}</h3>

                                <div class="account">
                                    <img src="{{getUserAvatar($founder->avatar)}}" alt="Founder">
                                    <span>
                                        {{ hasAccessToSeeStartup($startup) ? $founder->name : substr($founder->name, 0, 3) . '...' }}
                                    </span>
                                </div>

                                <div class="place__desc open mt-3">
                                    @if(hasAccessToSeeStartup($startup))
                                        <a href="@php echo $founder->linkedin; @endphp" style="border-bottom: solid 1px #66e3c4;color: #000000;" target="_blank">
                                            @php echo $founder->linkedin; @endphp
                                        </a>
                                    @else
                                        <a href="/billing" style="border-bottom: solid 1px #66e3c4;color: #000000;" target="_blank">
                                            https://www.linkedin.com/in/<i class="las la-lock la-20"></i>
                                        </a>
                                    @endif
                                </div>

                                <div class="place__desc open">
                                    @php echo $founder->bio; @endphp
                                </div>
                            </div>

                            @if(isset($amenities))
                                <div class="place__box place__box-hightlight">
                                    <div class="hightlight-grid">
                                        @foreach($amenities as $key => $item)
                                            @if($key < 4)
                                                <div class="place__amenities">
                                                    <span>{{$item->name}}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div><!-- .place__box -->
                            @endif

                            {{-- <div class="place__box place__box-map">
                                <h3 class="place__title--additional">
                                    {{__('Deck')}}
                                </h3>

                                <iframe src="{{$startup->deck}}" width="100%" height="480px" allowfullscreen="" style="border: 0px;"></iframe>
                            </div> --}}
                            <!-- .place__box -->

                            @php
                            $have_opening_hour = false;
                            if($startup->opening_hour){
                                foreach ($startup->opening_hour as $opening):
                                    if ($opening['title'] && $opening['value']):
                                    $have_opening_hour = true;
                                    endif;
                                endforeach;
                            }
                            @endphp
                            @if($have_opening_hour)
                                <div class="place__box place__box-open">
                                    <h3 class="place__title--additional">
                                        {{__('KEY METRICS')}}
                                    </h3>
                                    <table class="open-table">
                                        <tbody>
                                        @foreach($startup->opening_hour as $opening)
                                            @if($opening['title'] && $opening['value'])
                                                <tr>
                                                    <td class="day">{{$opening['title']}}</td>
                                                    <td class="time">
                                                        {!! hasAccessToSeeStartup($startup) ? $opening['value'] : '<a href="/billing"><i class="las la-lock la-20"></i> Upgrade to unlock</a>' !!}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- .place__box -->
                            @endif
                        </div><!-- .place__left -->
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar sidebar--shop sidebar--border">
                            <div class="widget-reservation-mini">
                                <h3>
                                    {{$startup->name}}
                                </h3>
                                <a href="#" class="open-wg btn">{{__('View More')}}</a>
                            </div>

                            <aside class="widget-booking-form">
                                <aside class="widget widget-shadow">
                                    <div class="place__box">
                                        <h3 class="mb-3 mt-0">
                                            Terms
                                        </h3>

                                        <table class="open-table">
                                            <tbody>
                                                <tr>
                                                    <td class="day">Stage</td>
                                                    <td class="time">{{ !$startup->stage ? 'Not Raising' : 'Raising now' }}</td>
                                                </tr>

                                                @if($startup->raising)
                                                <tr>
                                                    <td class="day">Raising</td>
                                                    <td class="time">
                                                        @php
                                                        $raising = preg_replace('/\D/', '', $startup->raising);
                                                        @endphp
                                                        ${{ number_format($raising, 0, '.', '.') }}
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                        <ul class="place__contact mt-3">
                                            <li class="note">
                                                Applied at {{ $startup->created_at->timezone('America/Sao_Paulo')->toFormattedDateString() }}
                                            </li>
                                        </ul>
                                    </div><!-- .place__box -->

                                </aside>

                                <aside class="widget widget-shadow">
                                    <h4 class="m-0 mb-2">
                                        <img src="https://uploads-ssl.webflow.com/61fe68941d6778510afa422e/61fe68951d67789b31fa42a0_icon-status-good.svg" alt="" width="20px">
                                        VERIFIED {!! $startup->verified ? '<span class="badge badge-verified ml-2">Verified by fundraise.vc</span>' : '' !!}
                                    </h4>

                                    @if($startup->verified)
                                        This profile is managed by the founder of the startup and the information has been verified by our team.
                                    @else
                                        This profile is managed by the investor company.
                                    @endif
                                </aside>

                                <aside class="widget widget-shadow">
                                    {{-- <h3>{{__('I want to invest')}}</h3> --}}
                                    <h3>{{__('Intro')}}</h3>
                                    <form class="form-underline" id="booking_submit_form" action="" method="post">
                                        @csrf
                                        <div class="field-input">
                                            <input type="text" id="name" name="name" placeholder="Enter your name *" required value="{{ User() ? User()->name : '' }}">
                                        </div>

                                        <div class="field-input">
                                            <input type="text" id="email" name="email" placeholder="Enter your email *" required value="{{ User() ? User()->email : '' }}">
                                        </div>

                                        <div class="field-input">
                                            <input type="text" id="phone_number" name="phone_number" placeholder="Enter your phone" value="{{ User() ? User()->phone_number : '' }}">
                                        </div>

                                        <div class="field-input">
                                            <div class="field-group field-select">
                                                <select name="check_size" id="check_size" required class="p-0">
                                                    <option value="">Typical Check Size</option>
                                                    <option value="1k">$1k</option>
                                                    <option value="2.5k">$2.5k</option>
                                                    <option value="5k">$5k</option>
                                                    <option value="10k">$10k</option>
                                                    <option value="25k">$25k</option>
                                                    <option value="50k">$50k</option>
                                                    <option value="100k">$100k</option>
                                                    <option value="250k">$250k</option>
                                                    <option value="500k">$500k</option>
                                                    <option value="1M+">$1M+</option>
                                                </select>
                                                <i class="la la-angle-down"></i>
                                            </div>
                                        </div>

                                        <div class="field-input">
                                            <textarea type="text" id="message" name="message" placeholder="Enter your message">Hello how are you? I saw your profile on Fundraise.vc and would like to chat about the fund. What do you think?</textarea>
                                        </div>

                                        <input type="hidden" name="type" value="{{\App\Models\Booking::TYPE_CONTACT_FORM}}">

                                        <input type="hidden" name="place_id" value="{{$startup->id}}">

                                        @if(hasAccessToSeeStartup($startup))
                                            <button class="btn booking_submit_btn">{{__('Send Intro')}}</button>
                                        @else
                                            <a href="/billing" class="btn booking_submit_btn">
                                                <i class="las la-lock la-20"></i> {{ __('Upgrade to unlock') }}
                                            </a>
                                        @endif

                                        <p class="note">{{__("The investor will be notified of your interest in being an investor.")}}</p>

                                        <div class="alert alert-success alert_booking booking_success">
                                            <p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                    <path fill="#4fd3b2" fill-rule="nonzero" d="M9.967 0C4.462 0 0 4.463 0 9.967c0 5.505 4.462 9.967 9.967 9.967 5.505 0 9.967-4.462 9.967-9.967C19.934 4.463 15.472 0 9.967 0zm0 18.065a8.098 8.098 0 1 1 0-16.196 8.098 8.098 0 0 1 8.098 8.098 8.098 8.098 0 0 1-8.098 8.098zm3.917-12.338a.868.868 0 0 0-1.208.337l-3.342 6.003-1.862-2.266c-.337-.388-.784-.589-1.207-.336-.424.253-.6.863-.325 1.255l2.59 3.152c.194.252.415.403.646.446l.002.003.024.002c.052.008.835.152 1.172-.45l3.836-6.891a.939.939 0 0 0-.326-1.255z"></path>
                                                </svg>
                                                {{__('The investor has been notified and will get back to you shortly.')}}
                                            </p>
                                        </div>
                                        <div class="alert alert-error alert_booking booking_error">
                                            <p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                    <path fill="#FF2D55" fill-rule="nonzero"
                                                        d="M11.732 9.96l1.762-1.762a.622.622 0 0 0 0-.88l-.881-.882a.623.623 0 0 0-.881 0L9.97 8.198l-1.761-1.76a.624.624 0 0 0-.883-.002l-.88.881a.622.622 0 0 0 0 .882l1.762 1.76-1.758 1.759a.622.622 0 0 0 0 .88l.88.882a.623.623 0 0 0 .882 0l1.757-1.758 1.77 1.771a.623.623 0 0 0 .883 0l.88-.88a.624.624 0 0 0 0-.882l-1.77-1.771zM9.967 0C4.462 0 0 4.462 0 9.967c0 5.505 4.462 9.967 9.967 9.967 5.505 0 9.967-4.462 9.967-9.967C19.934 4.463 15.472 0 9.967 0zm0 18.065a8.098 8.098 0 1 1 8.098-8.098 8.098 8.098 0 0 1-8.098 8.098z"></path>
                                                </svg>
                                                {{__('An error occurred. Please try again.')}}
                                            </p>
                                        </div>

                                    </form>
                                </aside>
                            </aside>
                        </div><!-- .sidebar -->

                    </div>
                </div>
            </div>
        </div><!-- .place -->
    </main><!-- .site-main -->

    @guest
        @include('frontend.startup.block')
    @endguest
@stop

@push('scripts')
    <script src="{{asset('assets/js/page_place_detail.js')}}"></script>
    @if(setting('map_service', 'google_map') === 'google_map')
        <script src="{{asset('assets/js/page_place_detail_googlemap.js')}}"></script>
    @else
        <script src="{{asset('assets/js/page_place_detail_mapbox.js')}}"></script>
    @endif

    <script>
        $('#modal_block').modal({backdrop: 'static', keyboard: false})
    </script>
@endpush

