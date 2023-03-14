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

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}"/>


    <link href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <link href="{{asset('admin/build/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <script>
        var app_url = window.location.origin;
    </script>

    <style>
        .startup, .investor {
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

                    <h1 class="text-center">Register</h1>

                    {{-- <small class="form-text text-danger golo-d-none" id="register_error">error!</small> --}}

                    <div class="field-group field-select mb-4">
                        <select name="profile" class="custom-select" id="profile" required>
                            <option value="">{{__('Select your profile')}}</option>
                            <option value="1">{{__("I'm a Founder")}}</option>
                            <option value="2">{{__("I'm an Investor")}}</option>
                        </select>
                        <i class="la la-angle-down"></i>
                    </div>

                    <div class="field-input">
                        <label for="name">Full Name</label>
                        <input type="text" id="register_name" name="name" placeholder="Full Name" class="form-control" required>
                    </div>

                    <div class="field-input">
                        <label for="email">Email</label>
                        <input type="email" id="register_email" name="email" placeholder="Email" class="form-control" required>
                    </div>

                    <div class="field-input">
                        <label for="linkedin">Linkedin</label>
                        <input type="text" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/" class="form-control" required>
                    </div>

                    <div class="field-input mb-4 startup">
                        <label for="bio">Your Short Bio</label>
                        <textarea type="text" id="bio" name="bio" placeholder="Your Short Bio" class="form-control" required></textarea>
                    </div>

                    <div class="field-group field-select mb-4 investor">
                        <label for="type_investor">{{__('Type of investor')}}</label>

                        <select name="type_investor" class="custom-select" id="type_investor" required>
                            <option value="">{{__('Select')}}</option>
                            <option value="Private Equity">{{__("Private Equity")}}</option>
                            <option value="Venture Capital">{{__("Venture Capital")}}</option>
                            <option value="Corporate Venture Capital">{{__("Corporate Venture Capital")}}</option>
                            <option value="Family Office">{{__("Family Office")}}</option>
                            <option value="Fund of Funds">{{__("Fund of Funds")}}</option>
                        </select>
                        <i class="la la-angle-down"></i>
                    </div>

                    <div class="field-group field-select mb-4 investor">
                        <label for="stage">{{__('Stage')}}</label>

                        <select name="stage" class="custom-select" id="stage" required>
                            <option value="">{{__('Select')}}</option>
                            <option value="Pre-seed">{{__("Pre-seed")}}</option>
                            <option value="Seed">{{__("Seed")}}</option>
                            <option value="Series A">{{__("Series A")}}</option>
                            <option value="Series B+">{{__("Series B+")}}</option>
                        </select>
                        <i class="la la-angle-down"></i>
                    </div>

                    <div class="field-group field-select mb-4 investor">
                        <label for="ticket">{{__('Ticket')}}</label>

                        <select name="ticket" class="custom-select" id="ticket" required>
                            <option value="">{{__('Select')}}</option>
                            <option value="< USD 500K">{{__("< USD 500K")}}</option>
                            <option value="USD 500K - 1M">{{__("USD 500K - 1M")}}</option>
                            <option value="USD 1M - 5M">{{__("USD 1M - 5M")}}</option>
                            <option value="USD 5M+">{{__("USD 5M+")}}</option>
                        </select>
                        <i class="la la-angle-down"></i>
                    </div>

                   {{--  <div class="field-group field-select">
                        <label for="lis_category">{{__('Sectors')}} *</label>
                        <select class="chosen-select" id="lis_category" name="category[]" data-placeholder="{{__('Select Sectors')}}" multiple required>
                            @foreach(\App\Models\Category::getAll(\App\Models\Category::TYPE_PLACE) as $cat)
                                <option value="{{$cat['id']}}">
                                    {{$cat['name']}}
                                </option>
                            @endforeach
                        </select>
                        <i class="la la-angle-down"></i>
                    </div> --}}

                    <div class="field-input">
                        <label for="password">{{__('Password')}}</label>

                        <input type="password" id="register_password" name="password" placeholder="******" class="form-control" required>
                    </div>

                    <div class="field-input">
                        <label for="password">{{__('Confirm Password')}}</label>

                        <input type="password" id="register_password_confirmation" name="password_confirmation" placeholder="******" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100" id="submit_register">{{__('Sign Up')}}</button>

                    {{-- <div class="field-check mt-4">
                        <label for="accept">
                            <input type="checkbox" id="accept" checked required>
                            Accept the <a title="Terms" href="#">Terms</a> and <a title="Privacy Policy" href="#">Privacy Policy</a>
                            <span class="checkmark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="6" viewBox="0 0 8 6">
                                <path fill="#FFF" fill-rule="nonzero" d="M2.166 4.444L.768 3.047 0 3.815 1.844 5.66l.002-.002.337.337L7.389.788 6.605.005z"/>
                            </svg>
                        </span>
                        </label>
                    </div> --}}
                </form>

                {{-- <form action="" method="POST" id="submit_register">
                    @csrf
                    <h1>Register</h1>

                    <p id="login_error" class="red"></p>
                    <div>
                        <input type="text" class="form-control" name="email" placeholder="{{__('Email')}}" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="{{__('Password')}}" required=""/>
                    </div>
                    <div>
                        <button class="btn btn-primary" id="submit_login">{{__('Login')}}</button>
                    </div>
                    <div class="clearfix"></div>
                </form> --}}

                <div class="separator">
                    <div>
                        <p>
                            Already have an account? <a href="{{ route('signin') }}">Login</a>
                        </p>
                    </div>
                </div>
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

    $( "#profile" ).change(function() {
        if($( this ).val() == 1) {
            $( ".startup" ).show();
            $( ".investor" ).hide();

            $("#bio").prop('required', true);

            $("#type_investor").prop('required', false);
            $("#stage").prop('required', false);
            $("#ticket").prop('required', false);
        } else if($( this ).val() == 2) {
            $( ".startup" ).hide();
            $( ".investor" ).show();

            $("#bio").prop('required', false);

            $("#type_investor").prop('required', true);
            $("#stage").prop('required', true);
            $("#ticket").prop('required', true);
        } else {
            $( ".investor" ).hide();
            $( ".startup" ).hide();

            $("#bio").prop('required', true);

            $("#type_investor").prop('required', true);
            $("#stage").prop('required', true);
            $("#ticket").prop('required', true);
        }
    });
</script>
</body>
</html>
