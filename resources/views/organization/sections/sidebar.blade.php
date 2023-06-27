<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
$segment_2 = Request::segment(2);
$segment_3 = Request::segment(3);

?>
<div id="sidebar-nav" class="sidebar ad-pannel-sdbar-sty">
    <nav>
        <ul class="nav" id="sidebar-nav-menu">
            <li>
                <a href="{{ route('organization.dashboard') }}" class="{{ $segment_2 == 'dashboard' ? 'active' : '' }}">
                    <i class="fa fa-dashboard"></i><span class="title">Dashboard</span>
                </a>
            </li>
            
        </ul>
</div>
