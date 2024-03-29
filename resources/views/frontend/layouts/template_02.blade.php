<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fundraise</title>
    <meta name="description" content="Fundraise">
    <meta property="title" content="Fundraise.vc" />
    <meta property="description" content="Fundraise" />
    <link rel="icon" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">

    {{-- {!! SEO::generate() !!} --}}

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/jost/stylesheet.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/slick/slick-theme.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.bubble.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.core.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.snow.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/chosen/chosen.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/photoswipe/photoswipe.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/photoswipe/default-skin/default-skin.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/lity/lity.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/gijgo/css/gijgo.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}?v={{env('VERSION')}}"/>

    @stack('styles')

    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <script>
        var app_url = window.location.origin;
    </script>
</head>

<body>
<div id="wrapper">
    <header id="header" class="site-header {{isRoute('home') || isRoute('place_detail') || isRoute('page_search_listing') ? 'home-header home-header-while' : ''}}">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-8">
                    <div class="site">
                        <div class="site__menu mobile">
                            <a title="Menu Icon" href="#" class="site__menu__icon">
                                <i class="las la-bars la-24-black"></i>
                            </a>
                            <div class="popup-background"></div>
                            <div class="popup popup--left">
                                <a title="Close" href="#" class="popup__close">
                                    <i class="las la-times la-24-black"></i>
                                </a><!-- .popup__close -->
                                <div class="popup__content">
                                    @guest
                                        <div class="popup__user popup__box open-form">
                                            <a title="Login" href="#" class="open-login">{{__('Login')}}</a>
                                            <a title="Sign Up" href="#" class="open-signup">{{__('Sign Up')}}</a>
                                        </div>
                                    @else
                                        <div class="account">
                                            <a href="#" title="{{Auth::user()->name}}">
                                                <img src="{{getUserAvatar(user()->avatar)}}" alt="{{Auth::user()->name}}">
                                                <span>
                                                    {{Auth::user()->name}}
                                                    <i class="la la-angle-down la-12"></i>
                                                </span>
                                            </a>
                                            <div class="account-sub">
                                                <ul>
                                                    <li class="{{isActiveMenu('user_profile')}}"><a href="{{route('user_profile')}}">{{__('Profile')}}</a></li>

                                                    @if(isUserInvestor())
                                                        <li class="{{isActiveMenu('user_wishlist')}}">
                                                            <a href="{{route('user_wishlist')}}">
                                                                {{__('My Startups')}}
                                                            </a>
                                                        </li>

                                                        <li class="{{isActiveMenu('user_wishlist')}}">
                                                            <a href="{{route('investor_fundslist')}}">
                                                                {{__('My Funds')}}
                                                            </a>
                                                        </li>
                                                    @endif

                                                    {{-- <li class="{{isActiveMenu('user_wishlist')}}"><a href="{{route('user_wishlist')}}">{{__('Wishlist')}}</a></li> --}}
                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
                                                        <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .account -->
                                    @endguest
                                    {{-- <div class="popup__destinations popup__box">
                                        <ul class="menu-arrow">
                                            <li>
                                                <a title="Destinations" href="#">{{__('Destinations')}}</a>
                                                <ul class="sub-menu">
                                                    @foreach($destinations as $city)
                                                        <li><a href="{{route('page_search_listing', ['city[]' => $city->id])}}" title="{{$city->name}}">{{$city->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    <!-- .popup__destinations -->
                                    <div class="popup__menu popup__box hidden">
                                        <ul class="menu-arrow">
                                            <li>
                                                <a title="Home demo" href="{{route('home')}}">Home</a>
                                                <ul class="sub-menu">
                                                    <li><a href="https://lara-restaurant.getgolo.com">Restaurant</a></li>
                                                    <li><a href="https://lara-business.getgolo.com">Business Listing</a></li>
                                                    <li><a href="https://lara-cityguide.getgolo.com">City Guide</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a title="Place detail" href="#">Place detail</a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('place_detail', 'boot-cafe')}}">Booking form</a></li>
                                                    <li><a href="{{route('place_detail', 'le-meurice')}}">Affiliate Book Buttons</a></li>
                                                    <li><a href="{{route('place_detail', 'musee-guimet')}}">Affiliate Banner Ads</a></li>
                                                    <li><a href="{{route('place_detail', 'clamato')}}">Enquiry Form</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a title="Page" href="#">Page</a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('home')}}/post/about-us-10">About</a></li>
                                                    <li><a href="{{route('home')}}/page-404">404</a></li>
                                                    <li><a href="{{route('home')}}/post/faqs-11">Faqs</a></li>
                                                    <li><a href="{{route('page_landing', '03')}}">App Landing</a></li>
                                                    <li><a href="{{route('page_landing', '01')}}">Construction</a></li>
                                                    <li><a href="{{route('page_landing', '02')}}">Coming Soon</a></li>
                                                </ul>
                                            </li>
                                            <li><a title="Blog" href="{{route('post_list_all')}}">Blog</a></li>
                                            <li><a title="Contacts" href="{{route('page_contact')}}">Contact</a></li>
                                        </ul>
                                    </div><!-- .popup__menu -->
                                </div><!-- .popup__content -->
                                <div class="popup__button popup__box ">
                                    @if(user())
                                        <a class="btn" href="{{route('page_search_listing')}}">
                                            <span>{{__('Search startup')}}</span>
                                        </a>
                                    @endif

                                    @if(user())
                                        <a class="btn" href="{{route('place_addnew')}}">
                                            <span>{{__('Add place')}}</span>
                                        </a>
                                    @endif
                                </div><!-- .popup__button -->
                            </div><!-- .popup -->
                        </div><!-- .site__menu -->
                        <div class="site__brand dark">
                            <a title="Logo" href="{{route('home')}}" class="site__brand__logo"><img src="{{asset(setting('logo') ? 'uploads/' . setting('logo') : 'assets/images/assets/logo.png')}}" alt="logo"></a>
                        </div>
                        <div class="site__brand light">
                            <a title="Logo" href="{{route('home')}}" class="site__brand__logo"><img src="{{asset(setting('logo') ? 'assets/images/fundraisevc-light.png' : 'assets/images/assets/logo.png')}}" alt="logo"></a>
                        </div>
                        <!-- .site__brand -->
                        @unless(isRoute('home'))

                        @endunless
                    </div><!-- .site -->
                </div><!-- .col-md-6 -->


                <div class="col-md-8 col-4">
                    <div class="right-header align-right">
                        {{-- <div class="right-header__languages">
                            <a href="#">
                                <img src="{{flagImageUrl(\Illuminate\Support\Facades\App::getLocale())}}">
                                @if(count($languages) > 1)
                                    <i class="las la-angle-down la-12-black"></i>
                                @endif
                            </a>
                            @if(count($languages) > 1)
                                <ul>
                                    @foreach($languages as $language)
                                        @if(\Illuminate\Support\Facades\App::getLocale() !== $language->code)
                                            <li><a href="{{route('change_language', $language->code)}}" title="{{$language->name}}"><img src="{{flagImageUrl($language->code)}}">{{$language->name}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </div> --}}

                        {{-- <div class="right-header__destinations">
                            <a title="Destinations" href="#">
                                {{__('Destinations')}}
                                <i class="las la-angle-down la-12-black"></i>
                            </a>
                            <ul>
                                @foreach($destinations as $city)
                                    <li><a href="{{route('page_search_listing', ['city[]' => $city->id])}}" title="{{$city->name}}">{{$city->name}}</a></li>
                                @endforeach
                            </ul>
                        </div> --}}
                        <!-- .right-header__destinations -->

                        @guest
                            <div class="right-header__login">
                                <a title="Login" class="" href="{{ route('signin') }}">
                                    {{__('Login')}}
                                </a>
                            </div><!-- .right-header__login -->
                            <div class="popup popup-form">
                                <a title="Close" href="#" class="popup__close">
                                    <i class="las la-times la-24-black"></i>
                                </a><!-- .popup__close -->
                                <ul class="choose-form">
                                    <li class="nav-login">
                                        <a title="Log In" href="#login">
                                            {{__('Log In')}}
                                        </a>
                                    </li>

                                    <li class="nav-signup">
                                        <a title="Sign Up" href="#register">
                                            {{__('Sign Up')}}
                                        </a>
                                    </li>
                                </ul>
                                {{-- <p class="choose-more">{{__('Continue with')}} <a title="Facebook" class="fb" href="{{route('login_social', 'facebook')}}">Facebook</a> or <a title="Google" class="gg" href="{{route('login_social', 'google')}}">Google</a></p>
                                <p class="choose-or"><span>{{__('Or')}}</span></p> --}}
                                <div class="popup-content">

                                    {{-- <form action="{{route('login')}}" class="form-log form-content" id="login" method="POST">
                                        @csrf
                                        <div class="field-input">
                                            <input type="text" id="email" name="email" placeholder="Email Address" required>
                                        </div>
                                        <div class="field-input">
                                            <input type="password" id="password" name="password" placeholder="Password" required>
                                        </div>
                                        <a title="Forgot password" class="forgot_pass" href="#">{{__('Forgot password')}}</a>

                                        <button type="submit" class="gl-button btn button w-100" id="submit_login">{{__('Login')}}</button>
                                    </form> --}}
                                    {{-- <form class="form-sign form-content" id="register" action="{{route('register')}}" method="post">
                                        @csrf
                                        <small class="form-text text-danger golo-d-none" id="register_error">error!</small>
                                        <div class="field-input">
                                            <input type="text" id="register_name" name="name" placeholder="Full Name" required>
                                        </div>
                                        <div class="field-input">
                                            <input type="email" id="register_email" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="field-input">
                                            <input type="password" id="register_password" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="field-input">
                                            <input type="password" id="register_password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>

                                        <div class="filter-list">
                                            <div class="filter-group">
                                                <div class="field-check">
                                                    <label class="bc_filter" for="profile_startup">
                                                        <input type="radio" id="profile_startup" name="profile" value="1" checked="">
                                                        I'm Startup
                                                        <span class="checkmark"><i class="la la-check"></i></span>
                                                    </label>
                                                </div>

                                                <div class="field-check">
                                                    <label class="bc_filter" for="profile_investor">
                                                        <input type="radio" id="profile_investor" name="profile" value="2">
                                                        I'm Investor
                                                        <span class="checkmark"><i class="la la-check"></i></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="gl-button btn button w-100" id="submit_register">{{__('Sign Up')}}</button>

                                        <div class="field-check mt-4">
                                            <label for="accept">
                                                <input type="checkbox" id="accept" checked required>
                                                Accept the <a title="Terms" href="#">Terms</a> and <a title="Privacy Policy" href="#">Privacy Policy</a>
                                                <span class="checkmark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="6" viewBox="0 0 8 6">
                                                    <path fill="#FFF" fill-rule="nonzero" d="M2.166 4.444L.768 3.047 0 3.815 1.844 5.66l.002-.002.337.337L7.389.788 6.605.005z"/>
                                                </svg>
                                            </span>
                                            </label>
                                        </div>
                                    </form> --}}

                                </div>
                            </div><!-- .popup-form -->
                        @else
                            <div class="account">
                                <a href="#" title="{{Auth::user()->name}}">
                                    <img src="{{getUserAvatar(user()->avatar)}}" alt="{{Auth::user()->name}}">
                                    <span>
										{{Auth::user()->name}}
										<i class="la la-angle-down la-12"></i>
									</span>
                                </a>
                                <div class="account-sub">
                                    <ul>
                                        @if(user()->isAdmin())
                                            <li class="{{isActiveMenu('admin_dashboard')}}"><a href="{{route('admin_dashboard')}}" target="_blank" rel="nofollow">{{__('Dashboard')}}</a></li>
                                        @endif

                                        <li class="{{isActiveMenu('user_profile')}}"><a href="{{route('user_profile')}}">{{__('Profile')}}</a></li>

                                        @if(isUserInvestor())
                                            <li class="{{isActiveMenu('user_wishlist')}}"><a href="{{route('user_wishlist')}}">{{__('My Startups')}}</a></li>

                                            <li class="{{isActiveMenu('investor_fundslist')}}"><a href="{{route('investor_fundslist')}}">{{__('My Funds')}}</a></li>

                                            <li class="{{isActiveMenu('user_my_place')}}"><a href="{{ '/billing' }}">{{__('Billing')}}</a></li>
                                        @endif

                                        {{-- <li class="{{isActiveMenu('user_wishlist')}}"><a href="{{route('user_wishlist')}}">{{__('Wishlist')}}</a></li> --}}
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
                                            <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .account -->
                        @endguest

                        <div class="right-header__search">
                            <a title="Search" href="#" class="search-open">
                                <i class="las la-search la-24-black"></i>
                            </a>
                        </div>

                        @if(user() && user()->profile == 2)
                            <div class="right-header__button btn">
                                <a title="Search startup" href="{{route('page_search_listing')}}">
                                    <span>{{__('Search startup')}}</span>
                                </a>
                            </div>
                        @endif

                        @if(user())
                            <div class="right-header__button btn">
                                <a title="Add startup" href="{{route('place_addnew')}}">
                                    <span>{{__('Add startup')}}</span>
                                </a>
                            </div>
                        @endif

                        @if(user() && user()->profile == 2)
                            <div class="right-header__button btn">
                                <a title="Search startup" href="{{route('fund_addnew')}}">
                                    <span>{{__('Add fund')}}</span>
                                </a>
                            </div>
                        @endif

                        @if(!user())
                            <div class="right-header__button btn">
                                <a title="Add startup" href="{{route('signup')}}">
                                    <span>{{__('Register')}}</span>
                                </a>
                            </div>
                        @endif
                        <!-- .right-header__button -->
                    </div><!-- .right-header -->
                </div><!-- .col-md-6 -->
            </div><!-- .row -->


        </div><!-- .container-fluid -->
    </header><!-- .site-header -->

    @yield('main')

    <footer id="footer" class="footer layout-02">
        <div class="footer__top hidden">
            <div class="row">
                <div class="col-lg-5">
                    <div class="footer__top__info">
                        <a title="Logo" href="#" class="footer__top__info__logo"><img src="{{asset(setting('logo') ? 'uploads/' . setting('logo') : 'assets/images/assets/logo.png')}}" alt="Golo"></a>
                        <p class="footer__top__info__desc">{{__('Sign-up to receive regular updates from us.')}}</p>
                        <form action="#" class="footer-subscribe">
                            <div class="field-input">
                                <input type="email" name="email" placeholder="Enter your email" value="">
                            </div>
                            <button><i class="las la-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2">
                    <aside class="footer__top__nav">
                        <h3>{{__('Company')}}</h3>
                        <ul>
                            <li><a href="#">{{__('About Us')}}</a></li>
                            <li><a href="#">{{__('Blog')}}</a></li>
                            <li><a href="#">{{__('Faqs')}}</a></li>
                            <li><a href="{{route('page_contact')}}">{{__('Contact')}}</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-2">
                    <aside class="footer__top__nav">
                        <h3>{{__('Support')}}</h3>
                        <ul>
                            <li><a href="#">Get in Touch</a></li>
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Live chat</a></li>
                            <li><a href="#">How it works</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-3">
                    <aside class="footer__top__nav footer__top__nav--contact">
                        <h3>{{__('Contact Us')}}</h3>
                        <p>{{__('Email: filipe@fundraise.vc')}}</p>
                        <p>{{__('Phone: 1 (00) 9999 9999')}}</p>
                        <ul>
                            <li>
                                <a title="Facebook" href="https://www.linkedin.com/company/fundraisevc/">
                                    <i class="la la-linkedin la-24"></i>
                                </a>
                            </li>
                            <li>
                                <a title="Twitter" href="#">
                                    <i class="la la-twitter la-24"></i>
                                </a>
                            </li>
                            <li>
                                <a title="Youtube" href="#">
                                    <i class="la la-youtube la-24"></i>
                                </a>
                            </li>
                            <li>
                                <a title="Instagram" href="#">
                                    <i class="la la-instagram la-24"></i>
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <p class="footer__bottom__copyright">{{now()->year}} &copy; {{__('fundraise.vc')}}. {{__('All rights reserved.')}}</p>
        </div>
    </footer>
    <!-- site-footer -->

    @if(isRoute('home'))
        @php
            // $img_home_banner_app = getImageUrl(setting('home_banner_app'));
            // if (setting('home_banner_app')) {
            //     $home_banner_app = "style=background-image:url({$img_home_banner_app})";
            // } else {
            //     $home_banner_app = "style=background-image:url(/assets/images/bg-app.png)";
            // }
        @endphp
        {{-- <div class="landing-banner business-landing-banner" {{$home_banner_app}}>
            <div class="container">
                <div class="lb-info">
                    <h2>{{__('The Golo App')}}</h2>
                    <p>{{__('Download the app and go to travel the world.')}}</p>
                    <div class="lb-button">
                        <a href="#" title="App store"><img src="{{asset('assets/images/app-store.png')}}" alt="App store"></a>
                        <a href="#" title="Google play"><img src="{{asset('assets/images/google-play.png')}}" alt="Google play"></a>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- .landing-banner -->
    @endif
</div><!-- #wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/libs/jquery-1.12.4.js')}}"></script>
<script src="{{asset('assets/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/libs/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/libs/slick/jquery.zoom.min.js')}}"></script>
<script src="{{asset('assets/libs/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/libs/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('assets/libs/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('assets/libs/lity/lity.min.js')}}"></script>
<script src="{{asset('assets/libs/quilljs/js/quill.core.js')}}"></script>
<script src="{{asset('assets/libs/quilljs/js/quill.js')}}"></script>
<script src="{{asset('assets/libs/gijgo/js/gijgo.min.js')}}"></script>
<script src="{{asset('assets/libs/chosen/chosen.jquery.min.js')}}"></script>
<!-- orther script -->
<script src="{{asset('assets/js/main_business.js?v=1.0')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/js/custom.js?v=1.0')}}?v={{env('VERSION')}}"></script>

<script src='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css' rel='stylesheet' />

<!-- Load the `mapbox-gl-geocoder` plugin. -->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">

<!-- Promise polyfill script is required -->
<!-- to use Mapbox GL Geocoder in IE 11. -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoibWluaHRoZSIsImEiOiJja2phc2l1eWc0OHF1MnJtMGw3ZzFjeXdxIn0.mJAsm20swzej4lWDUBucow';
</script>

@stack('scripts')

</body>
</html>
