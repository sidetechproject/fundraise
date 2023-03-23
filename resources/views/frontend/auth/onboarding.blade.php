<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fundraise</title>

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

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}"/>

    <link href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('admin/build/css/custom.min.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <script>
        var app_url = window.location.origin;
    </script>

    <style>
        .startup, .investor {
            display: none;
        }

        .parent > .row {
          display: flex;
          align-items: center;
          height: 100%;
        }
        .col img {
          height: 100px;
          width: 100%;
          cursor: pointer;
          transition: transform 1s;
          object-fit: cover;
        }
        .col label {
          overflow: hidden;
          position: relative;
        }
        .imgbgchk:checked + label > .tick_container {
          opacity: 1;
        }
        /*         aNIMATION */
        .imgbgchk:checked + label > img {
          transform: scale(1.25);
          opacity: 0.3;
        }
        .tick_container {
          transition: 0.5s ease;
          opacity: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          cursor: pointer;
          text-align: center;
        }
        .tick {
          background-color: #66e3c4;
          color: white;
          font-size: 16px;
          padding: 6px 12px;
          height: 40px;
          width: 40px;
          border-radius: 100%;
        }
        .registration_form, .login_form {
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .login_form {
            z-index: 22;
        }
        .login_content {
            margin: 0 auto;
            position: relative;
            text-align: center;
            text-shadow: 0 1px 0 #fff;
        }
        .login_wrapper {
            right: 0px;
            margin: 0px auto;
            margin-top: 5%;
            max-width: 350px;
            position: relative;
        }
        .login_wrapper {
            max-width: 436px !important;
        }
        .login_content form {
            margin: 20px 0;
            position: relative;
        }
        .login_content form input[type="text"], .login_content form input[type="email"], .login_content form input[type="password"] {
            border-radius: 3px;
            border: 1px solid #c8c8c8;
            color: #777;
            margin: 0 0 20px;
            width: 100%;
        }
        .chosen-container-multi .chosen-choices {
            border: 1px solid #c8c8c8;
            background-image: none;
        }
        .chosen-container-multi .chosen-choices li.search-choice {
            background-color: #66e3c4;
            padding: 3px 10px;
            color: #000000;
            font-family: inherit;
            margin-bottom: 10px;
        }
        .chosen-container-multi .chosen-choices li.search-choice .search-choice-close {
            right: 0;
            top: 10px;
        }
        .chosen-container-multi .chosen-choices li.search-choice span {
            word-wrap: break-word;
            margin-right: 5px;
        }
        .chosen-container-multi .chosen-choices {
            padding: 10px;
        }
    </style>
</head>
<body class="login">
<div>
    <div class="login_wrapper">
        <div class="form login_form ">
            <section class="login_content card">
                <form class="form-sign form-content text-left" id="onboarding" action="{{route('onboarding.save')}}" method="post">
                    @csrf

                    <h1 class="text-center">Your Account</h1>

                    <p class="mb-4 mt-4">
                        Set up your personal account
                    </p>

                    <div class="field-group field-select mb-4">
                        <label for="name">Full Name</label>
                        <input type="text" id="register_name" name="name" placeholder="Full Name" class="form-control" required>
                    </div>

                    <div class="field-group field-select mb-4">
                        <label for="linkedin">Linkedin</label>
                        <input type="text" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/profile" class="form-control" required>
                    </div>

                    @if(auth()->user()->profile == \App\Models\User::PROFILE_STARTUP)
                    <div class="field-input mb-4">
                        <label for="bio">Your Short Bio</label>
                        <textarea type="text" id="bio" name="bio" placeholder="Your Short Bio" class="form-control" required></textarea>
                    </div>
                    @endif

                    @if(auth()->user()->profile == \App\Models\User::PROFILE_INVESTOR)
                    <div class="field-group field-select mb-4">
                        <label for="type_investor">{{__('Type of investor')}}</label>


                        <select name="type_investor" class="custom-select" id="type_investor" required>
                            <option value="">{{__('Select')}}</option>
                            <option value="Private Equity">{{__("Private Equity")}}</option>
                            <option value="Venture Capital">{{__("Venture Capital")}}</option>
                            <option value="Corporate Venture Capital">{{__("Corporate Venture Capital")}}</option>
                            <option value="Family Office">{{__("Family Office")}}</option>
                            <option value="Fund of Funds">{{__("Fund of Funds")}}</option>
                        </select>
                    </div>
                    @endif

                    @if(auth()->user()->profile == \App\Models\User::PROFILE_INVESTOR)
                    <div class="field-group field-select mb-4">
                        <label for="stage">{{__('Stage')}}</label>

                        <select name="stage" class="custom-select" id="stage" required>
                            <option value="">{{__('Select')}}</option>
                            <option value="Pre-seed">{{__("Pre-seed")}}</option>
                            <option value="Seed">{{__("Seed")}}</option>
                            <option value="Series A">{{__("Series A")}}</option>
                            <option value="Series B+">{{__("Series B+")}}</option>
                        </select>
                    </div>
                    @endif

                   @if(auth()->user()->profile == \App\Models\User::PROFILE_INVESTOR)
                    <div class="field-group field-select mb-4">
                        <label for="ticket">{{__('Ticket')}}</label>

                        <select name="ticket" class="custom-select" id="ticket" required>
                            <option value="">{{__('Select')}}</option>
                            <option value="< USD 500K">{{__("< USD 500K")}}</option>
                            <option value="USD 500K - 1M">{{__("USD 500K - 1M")}}</option>
                            <option value="USD 1M - 5M">{{__("USD 1M - 5M")}}</option>
                            <option value="USD 5M+">{{__("USD 5M+")}}</option>
                        </select>
                    </div>
                    @endif

                   @if(auth()->user()->profile == \App\Models\User::PROFILE_INVESTOR)
                    <div class="field-group field-select mb-4">
                        <label for="categories">{{__('Sectors')}} *</label>
                        <select class="chosen-select custom-select" id="categories" name="categories[]" data-placeholder="{{__('Select Sectors')}}" multiple required>
                            @foreach(\App\Models\Category::getAll(\App\Models\Category::TYPE_PLACE) as $cat)
                                <option value="{{$cat['id']}}">
                                    {{$cat['name']}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    @if(auth()->user()->profile == \App\Models\User::PROFILE_INVESTOR)
                    <div class="field-group field-select mb-4">
                        <label for="countries">{{__('Countries')}} *</label>
                        <select class="chosen-select custom-select" id="countries" name="countries[]" data-placeholder="{{__('Select Countries')}}" multiple required>
                            @foreach(\App\Models\Country::getAll(\App\Models\Category::TYPE_PLACE) as $cat)
                                <option value="{{$cat['id']}}">
                                    {{$cat['name']}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <button type="submit" class="btn btn-primary w-100" id="submit_register">{{__('Continue')}}</button>

                </form>
            </section>
        </div>
    </div>
</div>

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

<script src="{{asset('/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script>
    $('#submit_register').submit(function (event) {
        event.preventDefault();
        let $form = $(this);
        let formData = getFormData($form);
        $('#submit_login').html(`<i class="fa fa-spinner fa-spin"></i>`).prop('disabled', true);
        $.ajax({
            type: "POST",
            url: `${app_url}/onboarding`,
            data: formData,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                $('#submit_login').html('Continue').prop('disabled', false);
                if (response.code === 200) {
                    window.location = `${app_url}/`;
                } else {
                    $('#login_error').show().text(response.message);
                }
            },
            error: function (jqXHR) {
                $('#submit_login').html('Continue').prop('disabled', false);
                var response = $.parseJSON(jqXHR.responseText);
                if (response.message) {
                    alert(response.message);
                }
            }
        });

    });

    /**
     * @param $form
     * return object
     */
    function getFormData($form) {
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};
        $.map(unindexed_array, function (n, i) {
            indexed_array[n['name']] = n['value'];
        });
        return indexed_array;
    }
</script>
</body>
</html>
