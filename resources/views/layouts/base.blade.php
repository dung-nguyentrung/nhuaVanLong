<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nhựa Vân Long</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo.png')}}">

    <!-- WebFont.js --> 
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800'] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="preload" href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}" as="font" type="font/woff2"
            crossorigin="anonymous">
    <link rel="preload" href="{{ asset('assets/fonts/wolmart.woff%3Fpng09e') }}" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
    
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
</head>

<body class="about-us">
    @php
        $setting = App\Models\Setting::first();
        $categories = App\Models\Category::all();
        $description = 'description_'.config('app.locale');
        $name = 'name_'.config('app.locale');
    @endphp
    <div class="page-wrapper">
        <!-- Start of Header -->
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Chào mừng đến với nhựa Vân Long!</p>
                    </div>
                    <div class="header-right">
                        <div class="dropdown">
                            <a href="about-us.html#currency">USD</a>
                            <div class="dropdown-box">
                                <a href="about-us.html#USD">USD</a>
                                <a href="about-us.html#EUR">EUR</a>
                            </div>
                        </div>
                        <!-- End of DropDown Menu -->

                        <div class="dropdown">
                            <a href="about-us.html#language"><img src="{{ asset('assets/images/flags/eng.png') }}" alt="ENG Flag" width="14"
                                    height="8" class="dropdown-image" /> ENG</a>
                            <div class="dropdown-box">
                                <a href="about-us.html#ENG">
                                    <img src="{{ asset('assets/images/flags/eng.png') }}" alt="ENG Flag" width="14" height="8"
                                        class="dropdown-image" />
                                    ENG
                                </a>
                                <a href="about-us.html#FRA">
                                    <img src="{{ asset('assets/images/flags/fra.png') }}" alt="FRA Flag" width="14" height="8"
                                        class="dropdown-image" />
                                    FRA
                                </a>
                            </div>
                        </div>
                        <!-- End of Dropdown Menu -->
                        <span class="divider d-lg-show"></span>
                        <a href="/blogs" class="d-lg-show">Tin tức</a>
                        <a href="/contact-us" class="d-lg-show">Liên lạc</a>
                        @if(Route::has('login'))
                            @auth
                            <a href="/" class="d-lg-show">Tài khoản của tôi</a>
                            @else
                            <a href="{{ route('login') }}" class="d-lg-show login sign-in"><i
                                    class="w-icon-account"></i>Đăng nhập</a>
                            <span class="delimiter d-lg-show">/</span>
                            <a href="{{ route('register') }}" class="ml-0 d-lg-show login register">Đăng ký</a>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <x-header-search />
                    <div class="header-right ml-4">
                        <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <div class="call-info d-lg-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                    <span class="text-capitalize">Gọi ngay</span></h4>
                                <a href="tel:{{ $setting->phone }}" class="phone-number font-weight-bolder ls-50">
                                    {{ $setting->phone  }}</a>
                            </div>
                        </div>
                        <a class="wishlist label-down link d-xs-show" href="{{ route('wishlist') }}">
                            <i class="fa fa-heart"></i>
                            <span class="wishlist-label d-lg-show">Yêu thích</span>
                        </a>
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <a href="{{ route('cart') }}" class="cart-toggle label-down link">
                                <i class="fa fa-shopping-cart"> 
                                </i>
                                <span class="cart-label">Giỏ hàng</span>
                            </a>
                            <!-- End of Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->

            <div class="header-bottom sticky-content fix-top sticky-header">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <div class="dropdown category-dropdown has-border" data-visible="true">
                                <a href="about-us.html#" class="category-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true" data-display="static"
                                    title="Browse Categories">
                                    <i class="fa fa-list-ul"></i>
                                    <span>Danh mục sản phẩm</span>
                                </a>

                                <div class="dropdown-box">
                                    <ul class="menu vertical-menu category-menu">
                                        @foreach ($categories as $category)
                                        <li>
                                            <a href="">
                                                <i class="fa fa-dot-circle"></i>{{ $category->$name }}
                                            </a>
                                        </li>                                                                                    
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <nav class="main-nav">
                                <ul class="menu">
                                    <li class="{{ Request::is('/') ? 'active' : '' }}">
                                        <a href="/">Trang chủ</a>
                                    </li>
                                    <li class="{{ Request::is('about-us') ? 'active' : '' }}">
                                        <a href="/about-us">Giới thiệu</a>
                                    </li>
                                    <li class="{{ Request::is('shop') ? 'active' : '' }}">
                                        <a href="/shop">Sản phẩm</a>
                                    </li>
                                    <li class="{{ Request::is('blogs') ? 'active' : '' }}">
                                        <a href="/blogs">Tin tức && sự kiện</a>
                                    </li>
                                    <li class="{{ Request::is('contact-us') ? 'active' : '' }}">
                                        <a href="/contact-us">Liên lạc</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->

        @yield('content')
           <!-- Start of Footer -->
           <footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
            <div class="footer-newsletter bg-primary pt-6 pb-6">
                <div class="container">
                </div>
            </div>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="widget widget-about">
                                <a href="demo2.html" class="logo-footer">
                                    <img src="{{ asset('assets/images/demos/demo2/logo.png') }}" alt="logo-footer" width="104"
                                        height="45" />
                                </a>
                                <div class="widget-body">
                                    <p class="widget-about-title">Gọi ngay cho chúng tôi !</p>
                                    <a href="tel:{{ $setting->phone }}" class="widget-about-call">{{ $setting->phone }}</a>
                                    <p class="widget-about-desc">{{ $setting->$description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h3 class="widget-title">Về chúng tôi</h3>
                                <ul class="widget-body">
                                    <li><a href="/about-us">Giới thiệu</a></li>
                                    <li><a href="">Điều khoản</a></li>
                                    <li><a href="">Chính sách mua hàng</a></li>
                                    <li><a href="/contact-us">Liên lạc</a></li>
                                    <li><a href="">Chi nhánh</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Tài khoản của bạn</h4>
                                <ul class="widget-body">
                                    <li><a href="/cart">Giỏ hàng</a></li>
                                    <li><a href="#">Hỗ trợ</a></li>
                                    <li><a href="wishlist.html">Yêu thích</a></li>
                                    <li><a href="#">Chính sách bảo mật</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Dịch vụ khách hàng</h4>
                                <ul class="widget-body">
                                    <li><a href="">Phương thức thanh toán</a></li>
                                    <li><a href="">Hỗ trợ trả hàng</a></li>
                                    <li><a href="">Trung tâm hỗ trợ</a></li>
                                    <li><a href="">Vận chuyển</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-left">
                        <p class="copyright">Copyright © 2021 VanLong Plastic. All Rights Reserved.</p>
                    </div>
                    <div class="footer-right">
                        <span class="payment-label mr-lg-8">Chúng tôi sử dụng phương thức thanh toán</span>
                        <figure class="payment">
                            <img src="assets/images/payment.png" alt="payment" width="159" height="25" />
                        </figure>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>


    <!-- Plugin JS File -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.count-to/jquery.count-to.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @stack('scripts')
</body>
</html>