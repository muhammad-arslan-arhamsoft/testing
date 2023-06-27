@extends('organization.layouts.auth')

@section('title', 'Login')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@section('content')
<div class="content">
    <div class="header">
        <div class="logo text-center">
            {{-- <img src="{{ asset('images/sign-01.svg') }}" alt="">
            <div class="logo-name">
                <img src="{{ asset('organization-assets/images/logo.svg') }}" alt="" class="logo-text-des">
            </div> --}}
            FYP
            <div class="logo-name">
                <!-- <img src="{{ asset('images/logo-text-b.svg') }}" alt=""
                    class="logo-text-des"> -->
            </div>
        </div>
        <h4 class="lead">Register Your Organization</h4>
    </div>
    <form id="organization_signup_form" class="form-auth-small" method="POST" action="{{ route('organization.register') }}">

        @csrf

        @if ($errors->has('error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $errors->first('error') }}
        </div>
        @endif

        @if (session()->get('flash_success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! session()->get('flash_success') !!}
        </div>
        @endif

        <input id="timezone" type="hidden" name="timezone">
        <div class="form-group">
            <label for="signin-email" class="control-label sr-only">Organization name</label>
            <input id="name" type="text" class="form-control" name="name" placeholder="Enter your organization name" required autofocus>
        </div>
        <div class="form-group">
            <label for="signin-email" class="control-label sr-only">Email</label>
            <input id="email" type="email" class="form-control" name="email" placeholder="Email address" required autofocus>
        </div>
        
        <div class="form-group forget">
            <label for="signin-password" class="control-label sr-only">Password</label>
            <span class="fa fa-fw fa-eye-slash password-field-icon toggle-password"></span>
          
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="form-group forget">
            <label for="signin-password" class="control-label sr-only">Confirm Password</label>
            <span class="fa fa-fw fa-eye-slash password-field-icon toggle-password"></span>
          
            <input id="cpassword" type="password" class="form-control" name="cpassword" placeholder="Password" required>
        </div>
        <button type="button" class="btn btn-primary btn-lg btn-block">Register</button>
    </form>
</div>
@endsection

@section('js')

<script>
    $('.btn-block').click(function() {
       
        $('#organization_signup_form').submit();
    });

    $(function() {
        $("#organization_signup_form").validate({
            rules: {
                name: {
                    required:true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                cpassword: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true,
                    checkEmail: $('#email').val(),
                },
                
            },
        });
        $(document).on('click', '.toggle_otp', function() {
            $('.show_otp').toggleClass('d-none');
        });
    });
    $.validator.addMethod("checkEmail", function(value, element, min) {
        var regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return regex.test($('#email').val())
    }, "Your enter email is not valid");
 

    $(window).load(function() {
        $('#timezone').val(Intl.DateTimeFormat().resolvedOptions().timeZone);
    });

    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $(this).siblings('input');
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>

@endsection