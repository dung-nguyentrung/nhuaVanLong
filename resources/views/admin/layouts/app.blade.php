<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    @stack('styles')
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        <div class="iq-sidebar  sidebar-default ">
            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="{{ route('dashboard') }}" class="header-logo">
                    <img src="{{ asset('admin/assets/images/logo.png') }}" class="img-fluid rounded-normal light-logo"
                        alt="logo">
                    <h5 class="logo-title light-logo ml-3">Quản lý</h5>
                </a>
                <div class="iq-menu-bt-sidebar ml-0">
                    <i class="las la-bars wrapper-menu"></i>
                </div>
            </div>
            <div class="data-scrollbar" data-scroll="1">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class="active">
                            <a href="{{ route('dashboard') }}" class="svg-icon">
                                <img src="{{ asset('admin/assets/images/icons/dashboard.png') }}" class="icon-left-bar" alt="Dashboard">
                                <span class="ml-4">Tổng quan</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="#product" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <img src="{{ asset('admin/assets/images/icons/user.png') }}" class="icon-left-bar" alt="User Management">
                                <span class="ml-4">Quản lý tài khoản</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="product" class="iq-submenu collapse"
                            data-parent="#iq-sidebar-toggle">
                                @can('permission_access')
                                <li class="">
                                    <a href="{{ route('permissions.index') }}">
                                        <img src="{{ asset('admin/assets/images/icons/permission.png') }}" class="icon-left-bar" alt="Permission">
                                        <i class="las la-minus"></i><span>Quyền truy cập</span>
                                    </a>
                                </li>                                    
                                @endcan
                                @can('role_access')
                                <li class="">
                                    <a href="{{ route('roles.index') }}">
                                        <img src="{{ asset('admin/assets/images/icons/role.png') }}" class="icon-left-bar" alt="Role">
                                        <i class="las la-minus"></i><span>Vai trò</span>
                                    </a>
                                </li>                                    
                                @endcan
                                @can('user_access')
                                <li class="">
                                    <a href="{{ route('users.index') }}">
                                        <img src="{{ asset('admin/assets/images/icons/list-user.png') }}" class="icon-left-bar" alt="Role">
                                        <i class="las la-minus"></i><span>Người dùng</span>
                                    </a>
                                </li>                                    
                                @endcan
                            </ul>
                        </li>
                        <li class="">
                            <a href="{{ route('contact') }}">
                                <img src="{{ asset('admin/assets/images/icons/contact.png') }}" class="icon-left-bar" alt="Testimonial">
                                <span class="ml-4">Liên hệ </span>
                            </a>
                        </li>
                        @can('customer_access')
                        <li class="">
                            <a href="{{ route('customers.index') }}">
                                <img src="{{ asset('admin/assets/images/icons/customer.png') }}" class="icon-left-bar" alt="Testimonial">
                                <span class="ml-4">Khách hàng </span>
                            </a>
                        </li>                            
                        @endcan
                        @can('category_access')
                        <li class="">
                            <a href="{{ route('categories.index') }}">
                                <img src="{{ asset('admin/assets/images/icons/category.svg') }}" class="icon-left-bar" alt="Role">
                                <span class="ml-4">Danh mục sản phẩm</span>
                            </a>
                        </li>                            
                        @endcan
                        @can('product_access')
                        <li class="">
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('admin/assets/images/icons/product.svg') }}" class="icon-left-bar" alt="Role">
                                <span class="ml-4">Sản phẩm</span>
                            </a>
                        </li>                            
                        @endcan
                        @can('order_access')
                        <li class="">
                            <a href="{{ route('orders.index') }}">
                                <img src="{{ asset('admin/assets/images/icons/order.svg') }}" class="icon-left-bar" alt="Role">
                                <span class="ml-4">Đơn hàng</span>
                            </a>
                        </li>                            
                        @endcan
                        @can('post_category_access')
                        <li class="">
                            <a href="{{ route('post_categories.index') }}">
                                <img src="{{ asset('admin/assets/images/icons/post_category.svg') }}" class="icon-left-bar" alt="Role">
                                <span class="ml-4">Danh mục bài viết</span>
                            </a>
                        </li>                            
                        @endcan
                        @can('tag_access')
                        <li class="">
                            <a href="{{ route('tags.index') }}">
                                <img src="{{ asset('admin/assets/images/icons/tag.svg') }}" class="icon-left-bar" alt="Role">
                                <span class="ml-4">Chủ đề bài viết</span>
                            </a>
                        </li>                            
                        @endcan
                        @can('post_access')
                        <li class="">
                            <a href="{{ route('posts.index') }}">
                                <img src="{{ asset('admin/assets/images/icons/post.svg') }}" class="icon-left-bar" alt="Role">
                                <span class="ml-4">Bài viết</span>
                            </a>
                        </li>                            
                        @endcan
                        @can('testimonial_access')
                        <li class="">
                            <a href="{{ route('testimonials.index') }}">
                                <img src="{{ asset('admin/assets/images/icons/testimonial.svg') }}" class="icon-left-bar" alt="Testimonial">
                                <span class="ml-4">Khách hàng đánh giá </span>
                            </a>
                        </li>                            
                        @endcan
                        @can('faq_access')
                        <li class="">
                            <a href="{{ route('faqs.index') }}">
                                <img src="{{ asset('admin/assets/images/icons/faq.svg') }}" class="icon-left-bar" alt="Testimonial">
                                <span class="ml-4">Câu hỏi thường gặp </span>
                            </a>
                        </li>                            
                        @endcan
                        @can('setting_access')
                        <li class="">
                            <a href="{{ route('settings.index') }}">
                                <img src="{{ asset('admin/assets/images/icons/setting.svg') }}" class="icon-left-bar" alt="Role">
                                <span class="ml-4">Thông tin website</span>
                            </a>
                        </li>                            
                        @endcan
                        <li class="">
                            <a href="{{ route('users.password') }}">
                                <img src="{{ asset('admin/assets/images/icons/password.png') }}" class="icon-left-bar" alt="Role">
                                <span class="ml-4">Đổi mật khẩu</span>
                            </a>
                        </li> 
                    </ul>
                </nav>
                <div class="p-3"></div>
            </div>
        </div>
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <i class="ri-menu-line wrapper-menu"></i>
                        <a href="/dashboard" class="header-logo">
                            <img src="{{ asset('admin/assets/images/logo.png') }}" class="img-fluid rounded-normal"
                                alt="logo">
                            <h5 class="logo-title ml-3">Quản lý </h5>
                        </a>
                    </div>
                    <div class="iq-search-bar device-search"></div>
                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon search-content">
                                    <div class="iq-search-bar iq-sub-dropdown dropdown-menu"
                                        aria-labelledby="dropdownSearch">
                                    </div>
                                </li>
                                <li class="nav-item nav-icon dropdown caption-content">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ Auth::user()->getFirstMediaUrl('users') }}" class="img-fluid rounded"
                                            alt="user">
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 text-center">
                                                <div class="media-body profile-detail text-center">
                                                    <img src="{{ asset('admin/assets/images/page-img/profile-bg.jpg') }}"
                                                        alt="profile-bg" class="rounded-top img-fluid mb-4">
                                                    <img src="{{ Auth::user()->getFirstMediaUrl('users') }}" alt="profile-img"
                                                        class="rounded profile-img img-fluid avatar-70">
                                                </div>
                                                <div class="p-3">
                                                    <h5 class="mb-1">
                                                        {{ Auth::user()->name }}
                                                    </h5>
                                                    <div class="d-flex align-items-center justify-content-center mt-3">
                                                        <a href="/" class="btn border mr-2" title="Xem trang chủ"><i class="fas fa-home"></i></a>
                                                        <a href="" class="btn border mr-2" title="Hồ sơ của bạn"><i class="fas fa-user-circle"></i></a>
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                            class="btn border" title="Đăng xuất"><i class="fas fa-sign-out-alt"></i></a>
                                                        <form action="{{ route('logout') }}" id="logout-form"
                                                            method="post">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="content-page" id="pjax-container">
            @yield('content')
        </div>
    </div>
    <!-- Wrapper End-->
    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('admin/assets/js/backend-bundle.min.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('admin/assets/js/table-treeview.js') }}"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    @stack('scripts')
</body>

</html>