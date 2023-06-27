@extends('organization.layouts.app')

@section('title', 'Profile')
@section('sub-title', 'Your Account Information')

@section('content')
<div class="main-content">
    <div class="content-heading clearfix">

    </div>
    <?php
    $user  = Auth::guard('organization')->user();
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Profile</h3>
                    </div>
                   
                    <div class="panel-body">
                        @include('organization.layouts.messages')
                        <h4 class="heading">Basic Information</h4>
                        <form id="profile-form" class="form-horizontal label-left" action="{{route('organization.profile')}}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">User Name*</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" maxlength="100" class="form-control" required="" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email*</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" maxlength="100" class="form-control" required="" value="{{$user->email}}" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Profile Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="profile_image" class="form-control" onchange="readURL(this,'profile_image',['jpg','png','jpeg','svg+xml'],'profile_image-error','image')">
                                    <span id="profile_image-error" style="display:none;color:#f36363;"></span>
                                    <br>
                                    <span class="label label-info">Note:</span> Recommended image resolution is 100x100 pixels.
                                    <br><br>
                                    <div style="width: 100px; height: auto">
                                        <img src="{{asset('uploads/admin-users')}}/{{$user->image}}" class="img-responsive" alt="Avatar" id="profile_image">
                                    </div>
                                </div>
                            </div>
                            <h4 class="heading">Password & Confirm Password</h4>
                            <div class="form-group">
                                <label for="confirm_password" class="col-sm-3 control-label">Old Password</label>
                                <div class="col-sm-9">
                                    <span class="fa fa-fw fa-eye password-field-icon toggle-password"></span>
                                    <input type="password" autocomplete="off" name="oldPassword" class="password form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <span class="fa fa-fw fa-eye password-field-icon toggle-password"></span>
                                    <input type="password" autocomplete="off" name="password" id="password" minlength="8" maxlength="30" class="password form-control">
                                </div>
                            </div>
                    </div>





                    <div class="form-group">
                        <label for="password_confirmation" class="col-sm-3 control-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <span class="fa fa-fw fa-eye password-field-icon toggle-password"></span>
                            <input type="password" autocomplete="off" name="password_confirmation" class="password form-control">
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="{{route('organization.dashboard')}}">
                            <button type="button" class="btn cancel btn-fullrounded">
                                <span>Cancel</span>
                            </button>
                        </a>

                        <button type="submit" class="btn btn-primary btn-fullrounded">
                            <span>Save</span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('js')

<script>
  
    $(function() {
        $('#profile-form').validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,

            rules: {
                password_confirmation: {
                    equalTo: "#password"
                },
            },


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
    });
</script>
@endsection