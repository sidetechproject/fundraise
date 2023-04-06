<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fundraise</title>

  <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/jost/stylesheet.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/line-awesome.min.css')}}?v={{env('VERSION')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/bootstrap/css/bootstrap.min.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/slick/slick-theme.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/slick/slick.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.bubble.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.core.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.snow.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/chosen/chosen.min.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/photoswipe/photoswipe.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/photoswipe/default-skin/default-skin.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/lity/lity.min.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/gijgo/css/gijgo.min.css')}}?v={{env('VERSION')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}?v={{env('VERSION')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}?v={{env('VERSION')}}"/>


    <link href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}?v={{env('VERSION')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}?v={{env('VERSION')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/nprogress/nprogress.css')}}?v={{env('VERSION')}}" rel="stylesheet">
    <link href="{{asset('admin/build/css/custom.min.css')}}?v={{env('VERSION')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}?v={{env('VERSION')}}" rel="stylesheet">
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
        .col {
            box-shadow: unset !important;
            border-width: 1px;
            border-style: solid;
            border-color: #e1e6eb;
            height: 150px;
            border-radius: 10px;
        }
        .col:hover {
            cursor: pointer;
            box-shadow: unset !important;
            background-color: rgba(0,20,40,0.016) !important;
            border: 1px solid #aab6c2 !important;
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
          transform: scale(1.05);
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
        .fields-signup {
            display: none;
        }
    </style>
</head>
<body class="login">
<div>
    <div class="login_wrapper">
        <div class="form login_form ">
            <section class="login_content card">
                <form class="form-sign form-content text-left" id="register" action="{{route('register')}}" method="post">
                    @csrf

                    <h1 class="text-center">Welcome</h1>

                    <h6 class="mb-4 mt-5">
                        Create a new Fundraise account or <a href="{{ route('signin') }}" class="border-bottom-none">click here</a>  to log in if you already have one.
                    </h6>

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="container parent">
                        <div class="row">
                            <div class='col text-center mr-2'>
                                <input type="radio" name="profile" id="startup" class="d-none imgbgchk" value="1" required>
                                <label for="startup" class="mt-4">
                                    <img src="{{ asset('/assets/images/startup-profile.png') }}" alt="Startup">
                                    <div class="tick_container">
                                        <div class="tick">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class='col text-center ml-2'>
                                <input type="radio" name="profile" id="investor" class="d-none imgbgchk" value="2" required>
                                <label for="investor" class="mt-4">
                                    <img src="{{ asset('/assets/images/investor-profile.png') }}" alt="Investor">
                                    <div class="tick_container">
                                        <div class="tick">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="fields-signup">
                        <div class="field-input mt-4">
                            <label for="email">Email</label>
                            <input type="email" id="register_email" name="email" placeholder="Email" class="form-control" required>
                        </div>

                        <div class="field-input mb-2">
                            <label for="password">{{__('Password')}}</label>

                            <input type="password" id="register_password" name="password" placeholder="******" class="form-control m-0" required>

                            <small>Password must be at least 8 characters long.</small>
                        </div>

                        <div class="field-input">
                            <label for="password">{{__('Confirm Password')}}</label>

                            <input type="password" id="register_password_confirmation" name="password_confirmation" placeholder="******" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" id="submit_register">
                            {{__('Sign Up')}}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<script src="{{asset('assets/libs/jquery-1.12.4.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/popper/popper.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/slick/slick.min.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/slick/jquery.zoom.min.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/isotope/isotope.pkgd.min.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/photoswipe/photoswipe.min.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/photoswipe/photoswipe-ui-default.min.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/lity/lity.min.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/quilljs/js/quill.core.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/quilljs/js/quill.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/gijgo/js/gijgo.min.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/libs/chosen/chosen.jquery.min.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('assets/js/main.js?v=1.4')}}?v={{env('VERSION')}}"></script>


<script src="{{asset('/admin/vendors/jquery/dist/jquery.min.js')}}?v={{env('VERSION')}}"></script>
<script src="{{asset('/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}?v={{env('VERSION')}}"></script>
<script>
    $('#submit_register').submit(function (event) {
        event.preventDefault();
        let $form = $(this);
        let formData = getFormData($form);
        $('#submit_login').html(`<i class="fa fa-spinner fa-spin"></i>`).prop('disabled', true);
        $.ajax({
            type: "POST",
            url: `${app_url}/register`,
            data: formData,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                $('#submit_login').html('Login').prop('disabled', false);
                if (response.code === 200) {
                    window.location = `${app_url}/`;
                } else {
                    $('#login_error').show().text(response.message);
                }
            },
            error: function (jqXHR) {
                $('#submit_login').html('Login').prop('disabled', false);
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

    $( "input[name='profile']" ).change(function() {
        $( ".fields-signup" ).show();
    });

    // $( "input[name='profile']" ).change(function() {
    //     if($( this ).val() == 1) {
    //         $( ".startup" ).show();
    //         $( ".investor" ).hide();

    //         $("#bio").prop('required', true);

    //         $("#type_investor").prop('required', false);
    //         $("#stage").prop('required', false);
    //         $("#ticket").prop('required', false);
    //     } else if($( this ).val() == 2) {
    //         $( ".startup" ).hide();
    //         $( ".investor" ).show();

    //         $("#bio").prop('required', false);

    //         $("#type_investor").prop('required', true);
    //         $("#stage").prop('required', true);
    //         $("#ticket").prop('required', true);
    //     } else {
    //         $( ".investor" ).hide();
    //         $( ".startup" ).hide();

    //         $("#bio").prop('required', true);

    //         $("#type_investor").prop('required', true);
    //         $("#stage").prop('required', true);
    //         $("#ticket").prop('required', true);
    //     }
    // });
</script>
</body>
</html>
