<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {!! SEO::generate() !!}
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

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}"/>

    <link rel="icon" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <script>
        var app_url = window.location.origin;
    </script>
    @stack('style')
</head>

<body dir="{{!setting('style_rtl') ?: 'rtl'}}">
<div id="wrapper">
    <header id="header" class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-8">
                    <div class="site">

                        <div class="site__brand dark">
                            <a title="Logo" href="{{route('home')}}" class="site__brand__logo"><img src="{{asset(setting('logo') ? 'uploads/' . setting('logo') : 'assets/images/assets/logo.png')}}" alt="logo"></a>
                        </div>
                        <div class="site__brand light">
                            <a title="Logo" href="{{route('home')}}" class="site__brand__logo"><img src="{{asset(setting('logo') ? 'assets/images/fundraisevc-light.png' : 'assets/images/assets/logo.png')}}" alt="logo"></a>
                        </div>

                    </div><!-- .site -->
                </div><!-- .col-md-6 -->


                <div class="col-md-6 col-4">
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
{{--
                        <div class="right-header__destinations">
                            <a title="Destinations" href="#">
                                {{__('Destinations')}}
                                <i class="la la-angle-down la-12"></i>
                            </a>
                            <ul>
                                @foreach($destinations as $city)
                                    <li><a href="{{route('city_detail', $city->slug)}}" title="{{$city->name}}">{{$city->name}}</a></li>
                                @endforeach
                            </ul>
                        </div> --}}
                        <!-- .right-header__destinations -->
                        @guest
                            <div class="right-header__login">
                                <a title="Login" class="open-login" href="#">{{__('Login')}}</a>
                            </div><!-- .right-header__login -->
                            <div class="right-header__signup">
                                <a title="Sign Up" class="open-signup" href="#">{{__('Sign Up')}}</a>
                            </div><!-- .right-header__signup -->
                            <div class="popup popup-form">
                                <a title="Close" href="#" class="popup__close">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                        <path fill="#5D5D5D" fill-rule="nonzero" d="M9.3 8.302l6.157-6.156a.706.706 0 1 0-.999-.999L8.302 7.304 2.146 1.148a.706.706 0 1 0-.999.999l6.157 6.156-6.156 6.155a.706.706 0 0 0 .998.999L8.302 9.3l6.156 6.156a.706.706 0 1 0 .998-.999L9.301 8.302z"/>
                                    </svg>
                                </a><!-- .popup__close -->
                                <ul class="choose-form">
                                    <li class="nav-login"><a title="Log In" href="#login">{{__('Login')}}</a></li>
                                    <li class="nav-signup"><a title="Sign Up" href="#register">{{__('Sign Up')}}</a></li>
                                </ul>
                                <div class="popup-content">

                                    <form class="form-log form-content" id="login" action="{{route('login')}}" method="POST">
                                        @csrf
                                        {{-- <p class="choose-more">{{__('Continue with')}} <a title="Facebook" class="fb" href="{{route('login_social', 'facebook')}}">Facebook</a> or <a title="Google" class="gg" href="{{route('login_social', 'google')}}">Google</a></p>
                                        <p class="choose-or"><span>{{__('Or')}}</span></p> --}}

                                        <small class="form-text text-danger golo-d-none" id="login_error">error!</small>
                                        <div class="field-input">
                                            <input type="text" id="email" name="email" placeholder="Email Address" required>
                                        </div>
                                        <div class="field-input">
                                            <input type="password" id="password" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="choose-form mb-0">
                                            <a title="Forgot password" class="forgot_pass" href="#forgot_password">{{__('Forgot password')}}</a>
                                        </div>
                                        <button type="submit" class="gl-button btn button w-100" id="submit_login">{{__('Login')}}</button>
                                    </form>

                                    <form class="form-sign form-content" id="register" action="{{route('register')}}" method="post">
                                        @csrf
                                        {{-- <p class="choose-more">{{__('Continue with')}} <a title="Facebook" class="fb" href="{{route('login_social', 'facebook')}}">Facebook</a> or <a title="Google" class="gg" href="{{route('login_social', 'google')}}">Google</a></p>
                                        <p class="choose-or"><span>{{__('Or')}}</span></p> --}}

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
                                    </form>

                                    <form class="form-forgotpass form-content" id="forgot_password" action="{{route('api_user_forgot_password')}}" method="POST">
                                        @csrf
                                        <p class="choose-or"><span>{{__('Lost your password? Please enter your email address. You will receive a link to create a new password via email.')}}</span></p>
                                        <small class="form-text text-danger golo-d-none" id="fp_error">error!</small>
                                        <small class="form-text text-success golo-d-none" id="fp_success">error!</small>
                                        <div class="field-input">
                                            <input type="text" id="email" name="email" placeholder="Email Address" required>
                                        </div>
                                        <button type="submit" class="gl-button btn button w-100" id="submit_forgot_password">{{__('Forgot password')}}</button>
                                    </form>

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

                                        @if(Auth::user()->profile == 2)
                                            <li class="{{isActiveMenu('user_wishlist')}}">
                                                <a href="{{route('user_wishlist')}}">
                                                    {{__('My Startups')}}
                                                </a>
                                            </li>
                                        @else
                                            <li class="{{isActiveMenu('user_my_place')}}">
                                                <a href="{{route('user_my_place')}}">
                                                    {{__('My Startups')}}
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
                        <div class="right-header__search">
                            <a title="Search" href="#" class="search-open">
                                <i class="la la-search la-24"></i>
                            </a>
                        </div>
                        @if(user() && user()->profile == 2)
                            <div class="right-header__button btn">
                                <a title="Search startup" href="{{route('page_search_listing')}}">
                                    <span>{{__('Search startup')}}</span>
                                </a>
                            </div>
                        @else
                            <div class="right-header__button btn">
                                <a title="Add startup" href="{{route('place_addnew')}}">
                                    <span>{{__('Add startup')}}</span>
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

    <footer id="footer" class="footer">
        <div class="container">
            {{-- <div class="footer__top">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="footer__top__info">
                            <a title="Logo" href="#" class="footer__top__info__logo"><img src="{{asset(setting('logo') ? 'uploads/' . setting('logo') : 'assets/images/assets/logo.png')}}" alt="logo"></a>
                            <p class="footer__top__info__desc">{{__('Discover amazing things to do everywhere you go.')}}</p>
                            <div class="footer__top__info__app">
                                <a title="App Store" href="#" class="banner-apps__download__iphone"><img src="{{asset('assets/images/assets/app-store.png')}}" alt="App Store"></a>
                                <a title="Google Play" href="#" class="banner-apps__download__android"><img src="{{asset('assets/images/assets/google-play.png')}}" alt="Google Play"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <aside class="footer__top__nav">
                            <h3>{{__('Company')}}</h3>
                            <ul>
                                <li><a href="{{route('post_detail', ['about-us', 10])}}">{{__('About Us')}}</a></li>
                                <li><a href="{{route('post_list_all')}}">{{__('Blog')}}</a></li>
                                <li><a href="{{route('post_detail', ['faqs', 11])}}">{{__('Faqs')}}</a></li>
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
                            <p>{{__('Email: support@domain.com')}}</p>
                            <p>{{__('Phone: 1 (00) 832 2342')}}</p>
                            <ul>
                                <li>
                                    <a title="Facebook" href="#">
                                        <i class="la la-facebook la-24"></i>
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
            </div> --}}
            <!-- .top-footer -->
            <div class="footer__bottom">
                <p class="footer__bottom__copyright">{{now()->year}} &copy; <a href="{{__('https://fundrasie.vc')}}" target="_blank">{{__('fundrasie.vc')}}</a>. {{__('All rights reserved.')}}</p>
            </div><!-- .top-footer -->
        </div><!-- .container -->
    </footer><!-- site-footer -->
</div><!-- #wrapper -->

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
<script src="{{asset('assets/js/main.js?v=1.4')}}"></script>

<script src='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css' rel='stylesheet' />

<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.4.3/imask.min.js" integrity="sha512-yJ3vm1HmQtcgeMtbUYCp7PuTLyjU+ffCnVNTuE1Uccv1BmkoaJIXt1EjBVGnscjCILc62hTJJJ2rJJBTcw8RjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('assets/js/custom.js?v=1.4')}}"></script>

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
