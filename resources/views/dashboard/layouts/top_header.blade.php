<div class="page-main-header print-d-none">
    <!--Page Header Start-->
    <div class="main-header-left" semilight-bg-color="bg-default-light-colo">
        <div class="logo-wrapper">
            <a href="http://127.0.0.1:8000/dashboard#/admin" id="logo" class="d-flex align-items-end gap-1">
                <img src="/assets/backend/logo.png" class="image-dark" alt="" /><img src="/assets/backend/logo.png"
                    class="image-light" alt="" /><span class="text-white h4">Dashboard</span>
            </a>
        </div>
    </div>
    <div class="main-header-right row" header-bg-color="bg-default-light-colo">
        <div class="mobile-sidebar col-1 ps-0">
            <div class="text-start switch-sm">
                <label class="switch"><input type="checkbox" id="sidebar-toggle" checked="checked" /><span
                        class="switch-state"></span></label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <li class="onhover-dropdown">
                    <div class="d-flex align-items-center">
                        <img class="align-self-center pull-right flex-shrink-0 me-2" src="/assets/backend/user.png"
                            alt="header-user" />
                        <div>
                            <h6 class="m-0 txt-dark f-16">My Account <i class="fa fa-angle-down pull-right ms-2"></i>
                            </h6>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20">
                        <li>
                            <a href="http://127.0.0.1:8000/dashboard#"><i class="icon-user"></i> Edit Profile </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                                    class="icon-power-off"></i> Logout </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--Page Header Ends-->
</div>
