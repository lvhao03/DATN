<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="{{ asset('assets/admin/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
            <img src="{{ asset('assets/admin/images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo">
            <img src="{{ asset('assets/admin/images/brand-logos/desktop-white.png') }}" alt="logo"
                class="desktop-white">
            <img src="{{ asset('assets/admin/images/brand-logos/toggle-white.png') }}" alt="logo"
                class="toggle-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Chính</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('admin.home') }}"
                        class="{{ Route::is('admin.home') ? 'active' : '' }} side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg>
                        <span class="side-menu__label">Thống kê</span>
                    </a>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Tổng quan</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <!-- Start::slide -->
                <li class="slide has-sub {{ Route::is('admin.category', 'admin.product','admin.variant', 'admin.comment') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="fa-solid fa-box side-menu__icon"></i>
                        <span class="side-menu__label">Sản phẩm</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide">
                            <a href="{{ route('admin.category') }}"
                                class="{{ Route::is('admin.category') ? 'active' : '' }}  side-menu__item">Danh mục</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.product') }}"
                                class="{{ Route::is('admin.product') ? 'active' : '' }} side-menu__item">Sản phẩm</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.variant') }}"
                                class="{{ Route::is('admin.variant') ? 'active' : '' }} side-menu__item">Biến thể</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.comment') }}"
                                class="{{ Route::is('admin.comment') ? 'active' : '' }} side-menu__item">Bình luận</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <li class="slide">
                    <a href="{{ route('admin.blog') }}"
                        class="side-menu__item  {{ Route::is('admin.blog') ? 'active' : '' }}">
                        <i class="fa-solid fa-pen-nib side-menu__icon"></i>
                        <span class="side-menu__label">Bài viết</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('admin.user') }}"
                        class="side-menu__item  {{ Route::is('admin.user') ? 'active' : '' }}">
                        <i class="fa-solid fa-user side-menu__icon"></i>
                        <span class="side-menu__label">Khách hàng</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('admin.staff') }}"
                        class="side-menu__item  {{ Route::is('admin.staff') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-tie side-menu__icon"></i>
                        <span class="side-menu__label">Nhân viên</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('admin.order') }}"
                        class="side-menu__item  {{ Route::is('admin.order') ? 'active' : '' }}">
                        <i class="fa-solid fa-truck  side-menu__icon"></i>
                        <span class="side-menu__label">Hoá đơn</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('admin.voucher') }}"
                        class="side-menu__item  {{ Route::is('admin.voucher') ? 'active' : '' }}">
                        <i class="fa-solid fa-ticket  side-menu__icon"></i>
                        <span class="side-menu__label">Mã giảm giá</span>
                    </a>
                </li>


            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
