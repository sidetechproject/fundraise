@extends('frontend.layouts.template')

@push('style')
    <style>
        i {margin-right: 10px;}input:focus, button:focus, .form-control:focus {outline: none;box-shadow: none;}.form-control:disabled, .form-control[readonly] {background-color: #fff;}.d-flex {display: flex;}.justify-content-center {justify-content: center;}.align-items-center {align-items: center;}.bg-color {background-color: #333;}.signup-step-container {padding: 80px 0px;padding-bottom: 60px;}.wizard .nav-tabs {position: relative;margin-bottom: 0;border-bottom-color: transparent;}.wizard > div.wizard-inner {position: relative;margin-bottom: 50px;text-align: center;}.connecting-line {height: 2px;background: #e0e0e0;position: absolute;width: 75%;margin: 0 auto;left: 0;right: 0;top: 15px;z-index: 1;}.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {color: #555555;cursor: default;border: 0;border-bottom-color: transparent;}span.round-tab {width: 30px;height: 30px;line-height: 30px;display: inline-block;border-radius: 50%;background: #fff;z-index: 2;position: absolute;left: 0;text-align: center;font-size: 16px;color: #0e214b;font-weight: 500;border: 1px solid #ddd;}span.round-tab i {color: #555555;}.wizard li.active span.round-tab {background: #66e3c4;color: #000000;border-color: #66e3c4;}.wizard li.active span.round-tab i {color: #66e3c4;}.wizard .nav-tabs > li.active > a i {color: #000000;}.wizard .nav-tabs > li {width: 25%;}.wizard li:after {content: " ";position: absolute;left: 46%;opacity: 0;margin: 0 auto;bottom: 0px;border: 5px solid transparent;border-bottom-color: red;transition: 0.1s ease-in-out;}.wizard .nav-tabs > li a {width: 30px;height: 30px;margin: 20px auto;border-radius: 100%;padding: 0;background-color: transparent;position: relative;top: 0;}.wizard .nav-tabs > li a i {position: absolute;top: -15px;font-style: normal;font-weight: 400;white-space: nowrap;left: 50%;transform: translate(-10%, -50%);font-size: 14px;font-weight: 700;color: #000;}.wizard .nav-tabs > li a:hover {background: transparent;}.wizard .tab-pane {position: relative;padding-top: 20px;}.wizard h3 {margin-top: 0;}.prev-step,.skip-btn {background-color: #ffffff;border-color: #ffffff;box-shadow: none;border: none; cursor: pointer;margin-right: 10px}.step-head {font-size: 20px;text-align: center;font-weight: 500;margin-bottom: 20px;}.term-check {font-size: 14px;font-weight: 400;}.custom-file {position: relative;display: inline-block;width: 100%;height: 40px;margin-bottom: 0;}.custom-file-input {position: relative;z-index: 2;width: 100%;height: 40px;margin: 0;opacity: 0;}.custom-file-label {position: absolute;top: 0;right: 0;left: 0;z-index: 1;height: 40px;padding: 0.375rem 0.75rem;font-weight: 400;line-height: 2;color: #495057;background-color: #fff;border: 1px solid #ced4da;border-radius: 0.25rem;}.custom-file-label::after {position: absolute;top: 0;right: 0;bottom: 0;z-index: 3;display: block;height: 38px;padding: 0.375rem 0.75rem;line-height: 2;color: #495057;content: "Browse";background-color: #e9ecef;border-left: inherit;border-radius: 0 0.25rem 0.25rem 0;}.footer-link {margin-top: 30px;}.all-info-container {}.list-content {margin-bottom: 10px;}.list-content a {padding: 10px 15px;width: 100%;display: inline-block;background-color: #f5f5f5;position: relative;color: #565656;font-weight: 400;border-radius: 4px;}.list-content a[aria-expanded="true"] i {transform: rotate(180deg);}.list-content a i {text-align: right;position: absolute;top: 15px;right: 10px;transition: 0.5s;}.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {background-color: #fdfdfd;}.list-box {padding: 10px;}.signup-logo-header .logo_area {width: 200px;}.signup-logo-header .nav > li {padding: 0;}.signup-logo-header .header-flex {display: flex;justify-content: center;align-items: center;}.list-inline li {display: inline-block;}.pull-right {float: right;}input[type="checkbox"] {position: relative;display: inline-block;margin-right: 5px;}input[type="checkbox"]::before, input[type="checkbox"]::after {position: absolute;content: "";display: inline-block;}input[type="checkbox"]::before {height: 16px;width: 16px;border: 1px solid #999;left: 0px;top: 0px;background-color: #fff;border-radius: 2px;}input[type="checkbox"]::after {height: 5px;width: 9px;left: 4px;top: 4px;}input[type="checkbox"]:checked::after {content: "";border-left: 1px solid #fff;border-bottom: 1px solid #fff;transform: rotate(-45deg);}input[type="checkbox"]:checked::before {background-color: #18ba60;border-color: #18ba60;}@media (max-width: 767px) {.sign-content h3 {font-size: 40px;}.wizard .nav-tabs > li a i {display: none;}.signup-logo-header .navbar-toggle {margin: 0;margin-top: 8px;}.signup-logo-header .logo_area {margin-top: 0;}.signup-logo-header .header-flex {display: block;}}

        .stripe-connect {
            background: #635bff;
            display: inline-block;
            height: 38px;
            text-decoration: none;
            width: 180px;

            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;

            user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;

            -webkit-font-smoothing: antialiased;
            border: none;
        }

        .stripe-connect span {
            color: #ffffff;
            display: block;
            font-family: sohne-var, "Helvetica Neue", Arial, sans-serif;
            font-size: 15px;
            font-weight: 400;
            line-height: 14px;
            padding: 11px 0px 0px 24px;
            position: relative;
            text-align: left;
        }

        .stripe-connect:hover {
            background: #7a73ff;
        }

        .stripe-connect span::after {
            background-repeat: no-repeat;
            background-size: 49.58px;
            content: "";
            height: 20px;
            left: 62%;
            position: absolute;
            top: 28.95%;
            width: 49.58px;
        }
        .stripe-connect span::after {
        background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='utf-8'%3F%3E%3C!-- Generator: Adobe Illustrator 23.0.4, SVG Export Plug-In . SVG Version: 6.00 Build 0) --%3E%3Csvg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 468 222.5' style='enable-background:new 0 0 468 222.5;' xml:space='preserve'%3E%3Cstyle type='text/css'%3E .st0%7Bfill-rule:evenodd;clip-rule:evenodd;fill:%23FFFFFF;%7D%0A%3C/style%3E%3Cg%3E%3Cpath class='st0' d='M414,113.4c0-25.6-12.4-45.8-36.1-45.8c-23.8,0-38.2,20.2-38.2,45.6c0,30.1,17,45.3,41.4,45.3 c11.9,0,20.9-2.7,27.7-6.5v-20c-6.8,3.4-14.6,5.5-24.5,5.5c-9.7,0-18.3-3.4-19.4-15.2h48.9C413.8,121,414,115.8,414,113.4z M364.6,103.9c0-11.3,6.9-16,13.2-16c6.1,0,12.6,4.7,12.6,16H364.6z'/%3E%3Cpath class='st0' d='M301.1,67.6c-9.8,0-16.1,4.6-19.6,7.8l-1.3-6.2h-22v116.6l25-5.3l0.1-28.3c3.6,2.6,8.9,6.3,17.7,6.3 c17.9,0,34.2-14.4,34.2-46.1C335.1,83.4,318.6,67.6,301.1,67.6z M295.1,136.5c-5.9,0-9.4-2.1-11.8-4.7l-0.1-37.1 c2.6-2.9,6.2-4.9,11.9-4.9c9.1,0,15.4,10.2,15.4,23.3C310.5,126.5,304.3,136.5,295.1,136.5z'/%3E%3Cpolygon class='st0' points='223.8,61.7 248.9,56.3 248.9,36 223.8,41.3 '/%3E%3Crect x='223.8' y='69.3' class='st0' width='25.1' height='87.5'/%3E%3Cpath class='st0' d='M196.9,76.7l-1.6-7.4h-21.6v87.5h25V97.5c5.9-7.7,15.9-6.3,19-5.2v-23C214.5,68.1,202.8,65.9,196.9,76.7z'/%3E%3Cpath class='st0' d='M146.9,47.6l-24.4,5.2l-0.1,80.1c0,14.8,11.1,25.7,25.9,25.7c8.2,0,14.2-1.5,17.5-3.3V135 c-3.2,1.3-19,5.9-19-8.9V90.6h19V69.3h-19L146.9,47.6z'/%3E%3Cpath class='st0' d='M79.3,94.7c0-3.9,3.2-5.4,8.5-5.4c7.6,0,17.2,2.3,24.8,6.4V72.2c-8.3-3.3-16.5-4.6-24.8-4.6 C67.5,67.6,54,78.2,54,95.9c0,27.6,38,23.2,38,35.1c0,4.6-4,6.1-9.6,6.1c-8.3,0-18.9-3.4-27.3-8v23.8c9.3,4,18.7,5.7,27.3,5.7 c20.8,0,35.1-10.3,35.1-28.2C117.4,100.6,79.3,105.9,79.3,94.7z'/%3E%3C/g%3E%3C/svg%3E");
        }
        .wizard .nav-tabs > li {
            width: 33%;
        }
        .connecting-line {
            width: 65%;
        }
    </style>
@endpush

@section('main')
    <main id="main" class="site-main listing-main">
        <div class="listing-content">
            <h2 class="m-auto text-center">
                @if(isRoute('fund_edit'))
                    {{__('Edit your')}} <mark>{{ __('Fund')}}</mark> {{ __('Profile') }}
                @else
                    {{__('Create your')}} <mark>{{ __('Fund') }}</mark> {{ __('Profile') }}
                @endif
            </h2>

            <section class="signup-step-container">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="wizard">
                                <div class="wizard-inner">
                                    <div class="connecting-line"></div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true">
                                                <span class="round-tab">1 </span> <i>{{__('Profile')}}</i>
                                            </a>
                                        </li>
                                        <li role="presentation" class="disabled">
                                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab">
                                                <span class="round-tab">3</span> <i>{{__('Metrics')}}</i>
                                            </a>
                                        </li>
                                        <li role="presentation" class="disabled">
                                            <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab">
                                                <span class="round-tab">4</span> <i>{{__('Fundraise')}}</i>
                                            </a>
                                        </li>
                                        {{-- <li role="presentation" class="disabled hide">
                                            <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab">
                                                <span class="round-tab">5</span> <i>{{__('Diligence')}}</i>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>

                                <form class="upload-form m-auto login-box" id="new_place" action="{{route('fund_create')}}" method="POST" enctype="multipart/form-data" role="form">
                                    @if(isRoute('fund_edit'))
                                        @method('PUT')
                                    @endif
                                    @csrf
                                    <div class="tab-content" id="main_form">
                                        <div class="tab-pane active" role="tabpanel" id="step1">

                                            <div class="listing-box" id="genaral">
                                                <h3>
                                                    <span class="avatar avatar-xs avatar-primary avatar-circle mr-2">
                                                        1
                                                    </span>
                                                    {{__('Profile')}}
                                                </h3>

                                                <div class="field-group field-file" style="max-width: 30%;">
                                                    <label for="thumb_image">{{__('Logo')}}</label>
                                                    <label for="thumb_image" class="preview">
                                                        @if($place && $place['thumb'])
                                                            <input type="file" id="thumb_image" name="thumb" class="upload-file">
                                                        @else
                                                            <input type="file" id="thumb_image" name="thumb" class="upload-file">
                                                        @endif

                                                        <img id="thumb_preview" src="{{$place && $place['thumb'] ? getImageUrl($place['thumb']) : asset('assets/images/no-logo.jpg')}}" alt=""/>

                                                        <i class="la la-cloud-upload-alt"></i>
                                                    </label>
                                                    <div class="field-note">{{__('Maximum file size: 1 MB')}}.</div>
                                                </div>

                                                <div class="field-group mt-5">
                                                    <label for="place_name">{{__('Fund name')}} *</label>
                                                    <input type="text" id="place_name" name="{{$language_default['code']}}[name]" value="{{$place ? $place['name'] : ''}}" required placeholder="{{__('What the name of your startup')}}">
                                                </div>

                                                <div class="field-group mt-5">
                                                    <label for="description">{{__('Summary')}} *</label>
                                                    <textarea class="form-control" id="description" name="{{$language_default['code']}}[description]" rows="5" placeholder="{{ __("Write down a short vesion of your pitch. This is where you use the elevator pitch if you have one.") }}">{{$place ? $place['description'] : ''}}</textarea>
                                                </div>
                                            </div>

                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn next-step">Continue to next step</button></li>
                                            </ul>
                                        </div>

                                        <div class="tab-pane" role="tabpanel" id="step3">
                                            <div class="listing-box" id="open">
                                                <h3>
                                                    <span class="avatar avatar-xs avatar-primary avatar-circle mr-2">
                                                        3
                                                    </span>
                                                    {{__('Key Metrics')}}
                                                </h3>
                                                <div class="group-field" id="time-opening">
                                                    @if($place)
                                                        @foreach($place['opening_hour'] as $index => $opening_hour)
                                                            <div class="field-inline field-3col openinghour_item">
                                                                <div class="field-group field-input">
                                                                    <input type="text" class="form-control valid" name="opening_hour[{{$index}}][title]" value="{{$opening_hour['title']}}">
                                                                </div>
                                                                <div class="field-group field-input">
                                                                    <input type="text" class="form-control" name="opening_hour[{{$index}}][value]" value="{{$opening_hour['value']}}">
                                                                </div>
                                                                <a href="#" class="openinghour_item_remove pt-2">
                                                                    <i class="la la-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        @foreach(METRICS_FUND as $key => $value)
                                                            <div class="place-fields-wrap">
                                                                <div class="place-fields place-time-opening row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control valid" name="opening_hour[{{ $loop->index }}][title]" value="{{$key}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="opening_hour[{{ $loop->index }}][value]" placeholder="{{$value}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>

                                                <a href="#open" id="openinghour_addmore" class="add-social btn">
                                                    <i class="la la-plus la-24 p-0 m-0"></i>
                                                </a>
                                            </div>

                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="default-btn prev-step">Back</button></li>
                                                <li><button type="button" class="btn next-step">Continue</button></li>
                                            </ul>
                                        </div>

                                        <div class="tab-pane" role="tabpanel" id="step4">
                                            <div class="all-info-container">
                                                <!-- .listing-box -->
                                                <div class="listing-box" id="media">
                                                    <h3>
                                                        <span class="avatar avatar-xs avatar-primary avatar-circle mr-2">
                                                            4
                                                        </span>
                                                        Fundraising
                                                    </h3>

                                                    <div class="field-group mt-5 field-select">
                                                        <label for="lis_place_type">{{__('Stage')}} *</label>
                                                        <select class="" id="lis_place_type" name="stage" data-placeholder="{{__('Select Stage')}}"  required>
                                                            <option value="0">Not Raising</option>
                                                            <option value="1">Raising now</option>
                                                        </select>
                                                        <i class="la la-angle-down"></i>
                                                    </div>

                                                    <div class="field-group mt-5 field-select">
                                                        <label for="raising">{{__('Raising')}}*</label>
                                                        <input type="text" id="raising-input" placeholder="{{__('$')}}" value="{{$place ? $place['raising'] : ''}}" name="raising" autocomplete="off" required/>
                                                    </div>

                                                    <div class="field-group mt-5">
                                                        <label for="place_video">{{__('Video')}}</label>
                                                        <input type="text" id="place_video" name="video" value="{{$place ? $place['video'] : ''}}" placeholder="{{__('Youtube, Vimeo video url')}}">
                                                    </div>

                                                    <div class="field-group mt-5 mb-5">
                                                        <label for="place_deck">{{__('Pitch Deck')}}</label>
                                                        <input type="text" id="place_deck" name="deck" value="{{$place ? $place['deck'] : ''}}" placeholder="{{__('Google Slides, Google Drive url')}}">
                                                    </div>
                                                </div><!-- .listing-box -->

                                                <p class="small px-4">
                                                    * Make sure all required fields <strong>*</strong> are filled in.
                                                </p>

                                            </div>
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="default-btn prev-step">Back</button></li>
                                                <li>
                                                    {{-- <button type="button" class="btn next-step">Finish</button> --}}

                                                    <input type="hidden" name="place_id" value="{{$place ? $place['id'] : ''}}">
                                                    @guest
                                                        <a href="#" class="btn btn-login open-login">{{__('Login to submit')}}</a>
                                                    @else
                                                        @if(isRoute('fund_edit'))
                                                            <input class="btn" type="submit" value="{{__('Update')}}">
                                                        @else
                                                            <input class="btn" type="submit" value="{{__('Submit')}}">
                                                        @endif
                                                    @endguest
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div><!-- .listing-content -->
    </main><!-- .site-main -->
@stop

@push('scripts')
    <script src="{{asset('assets/js/jquery.steps.js')}}"></script>
    <script src="{{asset('assets/js/page_place_new.js')}}"></script>

    <script>
        // ------------step-wizard-------------
        $(document).ready(function () {
        $(".nav-tabs > li a[title]").tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
            var target = $(e.target);

            if (target.parent().hasClass("disabled")) {
            return false;
            }
        });

        $(".next-step").click(function (e) {
            var active = $(".wizard .nav-tabs li.active");
            active.next().removeClass("disabled");
            nextTab(active);
        });
        $(".prev-step").click(function (e) {
            var active = $(".wizard .nav-tabs li.active");
            prevTab(active);
        });
        });

        function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
        }

        $(".nav-tabs").on("click", "li", function () {
        $(".nav-tabs li.active").removeClass("active");
        $(this).addClass("active");
        });
    </script>
@endpush
