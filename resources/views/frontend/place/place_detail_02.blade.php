@extends('frontend.layouts.template_02')
@section('main')
    <main id="main" class="site-main place-04">
        <div class="place">
            <div class="slick-sliders">
                <div class="slick-slider photoswipe hidden" data-item="1" data-arrows="false" data-itemScroll="1" data-dots="false" data-infinite="false" data-centerMode="false" data-centerPadding="0">
                    @if(isset($place->gallery))
                        @foreach($place->gallery as $gallery)
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
                    <a title="Save" href="#" class="add-wishlist @if($place->wish_list_count) remove_wishlist active @else @guest open-login @else add_wishlist @endguest @endif" data-id="{{$place->id}}">
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
                    <div class="col-lg-8">
                        <a href="{{ route('page_search_listing') }}" class="text-dark text-black">
                            <i class="las la-arrow-left ml-2 la-20"></i> Back to all Startups
                        </a>

                        <div class="place__left">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="place-thumb">
                                        @if($place->thumb)
                                            <img src="{{getImageUrl($place->thumb)}}" alt="{{$place->name}}" class="logo">
                                        @else
                                            <img src="{{ asset('assets/images/favicon.png') }}" alt="Logo" class="logo">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <ul class="place__breadcrumbs breadcrumbs">
                                        {{-- <li><a title="{{$city->name}}" href="{{route('page_search_listing', ['city[]' => $city->id])}}">{{$city->name}}</a></li> --}}
                                        @foreach($categories as $cat)
                                            <li><a href="{{route('page_search_listing', ['category[]' => $cat->id])}}" title="{{$cat->name}}">{{$cat->name}}</a></li>
                                        @endforeach
                                    </ul><!-- .place__breadcrumbs -->
                                    <div class="place__box place__box--npd">
                                        <h1>{{$place->name}}</h1>
                                        <div class="place__meta">
                                            <div class="place__reviews reviews hidden">
                                                    <span class="place__reviews__number reviews__number">
                                                        {{$review_score_avg}}
                                                        <i class="la la-star"></i>
                                                    </span>
                                                <span class="place__places-item__count reviews_count">({{count($reviews)}} reviews)</span>
                                            </div>

                                            <div class="place__currency">{{PRICE_RANGE[$place->price_range]}}</div>

                                            @if(isset($place_types))
                                                <div class="place__category">
                                                    @foreach($place_types as $type)
                                                        <a title="{{$type->name}}" href="{{route('page_search_listing', ['amenities[]' => $type->id])}}">{{$type->name}}</a>
                                                    @endforeach
                                                </div>
                                            @endif

                                            <div class="address">
                                                <i class="la la-map-marker"></i>
                                                {{$place->address}}
                                            </div>
                                        </div><!-- .place__meta -->

                                        <div class="place-gallery text-left">
                                            @if($place->website)
                                                <a href="//{{$place->website}}" target="_blank" rel="nofollow" class="lity-btn">
                                                    Visit Website <i class="las la-external-link-alt ml-2 la-20"></i>
                                                </a>
                                            @endif
                                            @if($place->deck)
                                                <a href="//{{$place->deck}}" target="_blank" rel="nofollow" class="lity-btn">
                                                    View Deck <i class="las la-external-link-alt ml-2 la-20"></i>
                                                </a>
                                            @endif
                                            @if($place->video)
                                                <a title="Video" href="{{$place->video}}" data-lity class="lity-btn">
                                                    <i class="la la-youtube la-24"></i>
                                                    {{__('Video')}}
                                                </a>
                                            @endif
                                        </div>
                                    </div><!-- .place__box -->
                                </div>
                            </div>

                            <div class="place__box place__box-overview">
                                <h3>{{__('Overview')}}</h3>
                                <div class="place__desc open">
                                    @php
                                        echo $place->description;
                                    @endphp
                                </div><!-- .place__desc -->
                                {{-- <a href="#" class="show-more" title="{{__('Show more')}}">{{__('Show more')}}</a> --}}
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

                                <iframe src="{{$place->deck}}" width="100%" height="480px" allowfullscreen="" style="border: 0px;"></iframe>
                            </div> --}}
                            <!-- .place__box -->

                            @php
                            $have_opening_hour = false;
                            if($place->opening_hour){
                                foreach ($place->opening_hour as $opening):
                                    if ($opening['title'] && $opening['value']):
                                    $have_opening_hour = true;
                                    endif;
                                endforeach;
                            }
                            @endphp
                            @if($have_opening_hour)
                                <div class="place__box place__box-open">
                                    <h3 class="place__title--additional">
                                        {{__('KEY TRACTION METRICS')}}
                                    </h3>
                                    <table class="open-table">
                                        <tbody>
                                        @foreach($place->opening_hour as $opening)
                                            @if($opening['title'] && $opening['value'])
                                                <tr>
                                                    <td class="day">{{$opening['title']}}</td>
                                                    <td class="time">{{$opening['value']}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- .place__box -->
                            @endif

                            <div class="place__box place__box--reviews hidden">
                                <h3 class="place__title--reviews">
                                    {{__('Review')}} ({{count($reviews)}})
                                    @if(isset($reviews))
                                        <span class="place__reviews__number"> {{$review_score_avg}}
                                            <i class="la la-star"></i>
                                        </span>
                                    @endif
                                </h3>

                                <ul class="place__comments">
                                    @foreach($reviews as $review)
                                        <li>
                                            <div class="place__author">
                                                <div class="place__author__avatar">
                                                    <a title="Nitithorn" href="#"><img src="{{getUserAvatar($review['user']['avatar'])}}" alt=""></a>
                                                </div>
                                                <div class="place__author__info">
                                                    <h4>
                                                        <a title="Nitithorn" href="#">{{$review['user']['name']}}</a>
                                                        <div class="place__author__star">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                                <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                                <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                                <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                                <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                                <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                                            </svg>
                                                            @php
                                                                $width = $review->score * 20;
                                                                $review_width = "style='width:{$width}%'";
                                                            @endphp
                                                            <span {!! $review_width !!}>
																<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
																    <path fill="#23D3D3" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
																</svg>
																<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
																    <path fill="#23D3D3" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
																</svg>
																<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
																    <path fill="#23D3D3" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
																</svg>
																<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
																    <path fill="#23D3D3" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
																</svg>
																<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
																    <path fill="#23D3D3" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
																</svg>
															</span>
                                                        </div>
                                                    </h4>
                                                    <time>{{formatDate($review->created_at, 'd/m/Y')}}</time>
                                                </div>
                                            </div>
                                            <div class="place__comments__content">
                                                <p>{{$review->comment}}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                @guest
                                    <div class="login-for-review account logged-out">
                                        <a href="#" class="btn-login open-login">{{__('Login')}}</a>
                                        <span>{{__('to review')}}</span>
                                    </div>
                                @else
                                    <div class="review-form">
                                        <h3>{{__('Write a review')}}</h3>
                                        <form id="submit_review">
                                            @csrf
                                            <div class="rate">
                                                <span>{{__('Rate This Place')}}</span>
                                                <div class="stars">
                                                    <a href="#" class="star-item" data-value="1" title="star-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                            <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="#" class="star-item" data-value="2" title="star-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                            <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="#" class="star-item" data-value="3" title="star-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                            <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="#" class="star-item" data-value="4" title="star-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                            <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="#" class="star-item" data-value="5" title="star-5">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                            <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="field-textarea">
                                                <img class="author-avatar" src="{{getUserAvatar(user()->avatar)}}" alt="">
                                                <textarea name="comment" placeholder="Comentário"></textarea>
                                            </div>
                                            <div class="field-submit">
                                                <small class="form-text text-danger" id="review_error">error!</small>
                                                <input type="hidden" name="score" value="">
                                                <input type="hidden" name="place_id" value="{{$place->id}}">
                                                <button type="submit" class="btn" id="btn_submit_review">{{__('Submit')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                @endguest

                            </div><!-- .place__box -->
                        </div><!-- .place__left -->
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar sidebar--shop sidebar--border">
                            <div class="widget-reservation-mini">
                                <h3>
                                    {{$place->name}}
                                </h3>
                                <a href="#" class="open-wg btn">{{__('View More')}}</a>
                            </div>

                            <aside class="widget-booking-form">
                                {{-- <aside class="sidebar--shop__item widget widget--ads">
                                    <div class="place-gallery">
                                        <button class="btn" title="Gallery">
                                            <i class="la la-hand-paper la-24"></i>
                                            {{__('Intro')}}
                                        </button>
                                        <button title="Video" class="btn">
                                            <i class="la la-wallet la-24"></i>
                                            {{__('Invest')}}
                                        </button>
                                    </div>
                                </aside> --}}

                                <aside class="widget widget-shadow">
                                    <div class="place__box">
                                        <h1>{{$place->name}}</h1>

                                        <ul class="place__contact mt-3">
                                            @if($place->phone_number)
                                                <li>
                                                    {{-- <i class="la la-phone"></i> --}}
                                                    <a href="tel:{{$place->phone_number}}" rel="nofollow">{{$place->phone_number}}</a>
                                                </li>
                                            @endif

                                            @if($place->email)
                                                <li>
                                                    {{-- <i class="la la-envelope"></i> --}}
                                                    <a href="mailto:{{$place->email}}" rel="nofollow">{{$place->email}}</a>
                                                </li>
                                            @endif

                                            @if($place->website)
                                                <li>
                                                    <a href="//{{$place->website}}" target="_blank" rel="nofollow">
                                                        {{ $place->website }}
                                                    </a>
                                                </li>
                                            @endif

                                            <li class="note">
                                                {{ $place->created_at->timezone('America/Sao_Paulo')->toFormattedDateString() }}
                                            </li>
                                        </ul>
                                    </div><!-- .place__box -->

                                    @if($place->social && isset($place->social[0]) && !empty($place->social[0]['name']))
                                        <div class="mb-3 mt-3 contact-icons">
                                            @foreach($place->social as $social)
                                                @if($social['name'] && $social['url'])
                                                    <a href="{{SOCIAL_LIST[$social['name']]['base_url'] . $social['url']}}" title="{{$social['url']}}" rel="nofollow" target="_blank">
                                                        <i class="{{SOCIAL_LIST[$social['name']]['icon']}}"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </aside>

                                {{-- <aside class="sidebar--shop__item widget widget--ads">
                                    <div class="place-gallery">
                                        @if(isset($place->gallery))
                                            <a class="show-gallery" title="Gallery" href="#">
                                                <i class="la la-images la-24"></i>
                                                {{__('Gallery')}}
                                            </a>
                                        @endif
                                    </div>
                                </aside> --}}

                                <aside class="widget widget-shadow">
                                    <h3>{{__('I want to invest')}}</h3>
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
                                            <textarea type="text" id="message" name="message" placeholder="Enter your message"></textarea>
                                        </div>

                                        <input type="hidden" name="type" value="{{\App\Models\Booking::TYPE_CONTACT_FORM}}">

                                        <input type="hidden" name="place_id" value="{{$place->id}}">

                                        <button class="btn booking_submit_btn">{{__('Send')}}</button>

                                        <p class="note">{{__("The startup will be notified of your interest in being an investor.")}}</p>

                                        <div class="alert alert-success alert_booking booking_success">
                                            <p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                    <path fill="#4fd3b2" fill-rule="nonzero" d="M9.967 0C4.462 0 0 4.463 0 9.967c0 5.505 4.462 9.967 9.967 9.967 5.505 0 9.967-4.462 9.967-9.967C19.934 4.463 15.472 0 9.967 0zm0 18.065a8.098 8.098 0 1 1 0-16.196 8.098 8.098 0 0 1 8.098 8.098 8.098 8.098 0 0 1-8.098 8.098zm3.917-12.338a.868.868 0 0 0-1.208.337l-3.342 6.003-1.862-2.266c-.337-.388-.784-.589-1.207-.336-.424.253-.6.863-.325 1.255l2.59 3.152c.194.252.415.403.646.446l.002.003.024.002c.052.008.835.152 1.172-.45l3.836-6.891a.939.939 0 0 0-.326-1.255z"></path>
                                                </svg>
                                                {{__('The startup has been notified and will get back to you shortly.')}}
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

                            <!-- .widget-reservation -->

                            {{-- <aside class="widget widget-shadow widget-reservation">
                                <h3>{{__('I want to invest')}}</h3>
                                <form action="#" method="POST" class="form-underline" id="booking_form">
                                    @csrf

                                    <input type="hidden" name="type" value="{{\App\Models\Booking::TYPE_BOOKING_FORM}}">
                                    <input type="hidden" name="place_id" value="{{$place->id}}">
                                    @guest()
                                        <button class="btn btn-login open-login">{{__('Submit')}}</button>
                                    @else
                                        <button class="btn booking_submit_btn">{{__('Submit')}}</button>
                                    @endguest
                                    <p class="note">{{__("You won't be charged yet")}}</p>

                                    <div class="alert alert-success alert_booking booking_success">
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path fill="#20D706" fill-rule="nonzero" d="M9.967 0C4.462 0 0 4.463 0 9.967c0 5.505 4.462 9.967 9.967 9.967 5.505 0 9.967-4.462 9.967-9.967C19.934 4.463 15.472 0 9.967 0zm0 18.065a8.098 8.098 0 1 1 0-16.196 8.098 8.098 0 0 1 8.098 8.098 8.098 8.098 0 0 1-8.098 8.098zm3.917-12.338a.868.868 0 0 0-1.208.337l-3.342 6.003-1.862-2.266c-.337-.388-.784-.589-1.207-.336-.424.253-.6.863-.325 1.255l2.59 3.152c.194.252.415.403.646.446l.002.003.024.002c.052.008.835.152 1.172-.45l3.836-6.891a.939.939 0 0 0-.326-1.255z"></path>
                                            </svg>
                                            {{__('You successfully created your booking.')}}
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
                            </aside> --}}
                            <!-- .widget-reservation -->

                                {{-- <aside class="sidebar--shop__item widget widget--ads">
                                    @if(setting('ads_sidebar_banner_image'))
                                        <a title="Ads" href="{{setting('ads_sidebar_banner_link')}}" target="_blank" rel="nofollow"><img src="{{asset('uploads/' . setting('ads_sidebar_banner_image'))}}" alt="banner ads golo"></a>
                                    @endif
                                </aside> --}}

                        </div><!-- .sidebar -->

                    </div>
                </div>
            </div>
        </div><!-- .place -->

        {{-- <div class="similar-places">
            <div class="container">
                <h2 class="similar-places__title title">{{__('Similar places')}}</h2>
                <div class="similar-places__content">
                    <div class="row">
                        @foreach($similar_places as $place)
                            <div class="col-lg-3 col-md-6">
                                @include('frontend.common.place_item')
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- .similar-places -->
    </main><!-- .site-main -->
@stop

@push('scripts')
    <script src="{{asset('assets/js/page_place_detail.js')}}"></script>
    @if(setting('map_service', 'google_map') === 'google_map')
        <script src="{{asset('assets/js/page_place_detail_googlemap.js')}}"></script>
    @else
        <script src="{{asset('assets/js/page_place_detail_mapbox.js')}}"></script>
    @endif
@endpush