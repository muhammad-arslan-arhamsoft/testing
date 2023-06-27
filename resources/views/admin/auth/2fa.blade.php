@extends('admin.layouts.auth')

@section('title', 'Login')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@section('content')

<div class="content">
    <div class="header">
        <div class="logo text-center">
            {{-- <img src="{{ asset('images/sign-01.svg') }}" alt="">
            <div class="logo-name">
                <img src="{{ asset('admin-assets/images/logo.svg') }}" alt="" class="logo-text-des">
            </div> --}}
            <img src="{{ asset('admin-assets/images/logo.svg') }}" alt="">
            <div class="logo-name">
                <!-- <img src="{{ asset('images/logo-text-b.svg') }}" alt=""
                    class="logo-text-des"> -->
            </div>
        </div>
    </div>
    <form id="login-form" class="form-auth-small" method="POST" action="{{ route('2fa') }}">

        @csrf

        @if ($errors->has('error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $errors->first('error') }}
        </div>
        @endif
        @if (session()->get('error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('error') }}
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

        <div class="form-group">
            <input type="hidden" type="text" name="google2fa_secret" value="{{$secret}}">
            <input type="hidden" type="text" name="user_id" value="{{$user_id}}">

            <p>Please enter the <strong>OTP</strong> generated on your Authenticator App. <br> Ensure you submit the current one because it refreshes every 30 seconds.</p>
            @if((isset($show_qr))&& $show_qr==1)
            <div>
                        {!! $qr_image !!}
            </div>
            @endif
            <label for="one_time_password" class="col-md-4 control-label">One Time Password</label>
            <div class="col-md-12 form-group">
                <input id="one_time_password" type="number" class="form-control" name="one_time_password" required autofocus>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Log In</button>
    </form>
</div>
@endsection

@section('js')



@endsection