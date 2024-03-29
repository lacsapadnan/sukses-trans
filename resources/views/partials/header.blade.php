<div id="kt_app_header" class="app-header">
    <!--begin::Header container-->
    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
        id="kt_app_header_container">
        <!--begin::Sidebar mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
        </div>
        <!--end::Sidebar mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ route('dashboard') }}" class="d-lg-none">
                <img alt="Logo" src="{{ URL::asset('assets/media/logos/logo-dark.svg') }}" class="h-30px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <!--begin::Menu wrapper-->
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <!--begin::Menu-->
                <div class="px-2 my-5 menu menu-rounded menu-column menu-lg-row my-lg-0 align-items-stretch fw-semibold px-lg-0"
                    id="kt_app_header_menu" data-kt-menu="true">
                    <!--begin:Menu item-->
                    <div class="menu-item me-0 me-lg-2 {{ request()->routeIs('dashboard') ? ' here' : '' }}">
                        <!--begin:Menu link-->
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <span class="menu-title">Dashboards</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item me-0 me-lg-2 {{ request()->routeIs('user.*') ? ' here' : '' }}">
                        <!--begin:Menu link-->
                        <a href="{{ route('user.index') }}" class="menu-link">
                            <span class="menu-title">User</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item me-0 me-lg-2 {{ request()->routeIs('container.*') ? ' here' : '' }}">
                        <!--begin:Menu link-->
                        <a href="{{ route('container.index') }}" class="menu-link">
                            <span class="menu-title">Container</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </a>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item me-0 me-lg-2 {{ request()->routeIs('product.*') ? ' here' : '' }}">
                        <!--begin:Menu link-->
                        <a href="{{ route('product.index') }}" class="menu-link">
                            <span class="menu-title">Produk</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item me-0 me-lg-2 {{ request()->routeIs('delivery-order.*') ? ' here' : '' }}">
                        <!--begin:Menu link-->
                        <a href="{{ route('delivery-order.index') }}" class="menu-link">
                            <span class="menu-title">Surat Jalan</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </a>
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Navbar-->
            <div class="flex-shrink-0 app-navbar">
                <!--begin::User menu-->
                <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <img src="{{ URL::asset('assets/media/avatars/300-1.jpg') }}" alt="user" />
                    </div>
                    <!--begin::User account menu-->
                    <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="px-3 menu-item">
                            <div class="px-3 menu-content d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{ URL::asset('assets/media/avatars/300-1.jpg') }}" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">{{ auth()->user()->name }}</div>
                                    <a href="#"
                                        class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="my-2 separator"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="px-5 menu-item">
                            <a href="../../demo1/dist/account/overview.html" class="px-5 menu-link">My Profile</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="px-5 menu-item">
                            <a href="{{ route('logout') }}" class="px-5 menu-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
                <!--begin::Header menu toggle-->
                <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                    <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px"
                        id="kt_app_header_menu_toggle">
                        <i class="ki-duotone ki-element-4 fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <!--end::Header menu toggle-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>
