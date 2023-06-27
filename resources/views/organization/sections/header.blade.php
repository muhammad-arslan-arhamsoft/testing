<nav class="navbar navbar-default navbar-fixed-top organization-pannel-styling">
    <div class="brand logo-sty">
        <a href="{{route('organization.dashboard')}}">
        <img src="{{ asset('organization-assets/images/logo.svg') }}" style="width: 140px">
        </a>
        <div id="tour-fullwidth" class="navbar-btn-togl">
            <button type="button" class="btn-toggle-fullwidth"><i class="ti-arrow-circle-left"></i></button>
        </div>
    </div>
    <div class="right-menu-bar">
        <div id="navbar-menu" class="navbar-menu head-sec-des">
            <div class="heading hidden-xs">
                <h1 class="page-title">@yield('title')</h1>
                <p class="page-subtitle">@yield('sub-title')</p>
            </div>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle user-status-div" data-toggle="dropdown">
                        <div class="user-name-sty">
                            <span>{{ Auth::guard('organization')->user()->name }}</span>
                            @php
                            $image  = Auth::guard('organization')->user()->image;
                              if( $image == "" || $image == null){
                                 $image = asset('uploads/default.png');
                              }else{
                                  $image = asset('uploads/organization-users')."/".Auth::guard('organization')->user()->image;
                              }
                            @endphp
                            <img src="{{$image}}">
                        </div>
                        <div class="user-img-sty">
                        </div>

                    </a>
                    <ul class="dropdown-menu logged-user-menu">
                        <li>
                            <a href="{{route('organization.logout')}}">
                                <i class="ti-power-off"></i> <span>Logout</span>
                            </a>
                            <a href="{{route('organization.profile')}}">
                                <i class="ti-user"></i> <span>Profile</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="xs-visi-btn">
                    <button class="navicon navbar-toggler btn-toggle-fullwidth" type="button" id="tour-fullwidth">
                        <div class="navicon__holder">
                            <div style="display:inline-block">
                                <div class="navicon__line"></div>
                                <div class="navicon__line"></div>
                                <div class="navicon__line"></div>
                            </div>
                        </div>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
