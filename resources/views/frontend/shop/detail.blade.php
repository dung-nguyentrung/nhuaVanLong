@extends('layouts.base')
@section('title', $product->name)
@push('styles')
    <meta property="og:site_name" content="{{ $product->name }}" />
    <meta property="article:author" content="Công ty TNHH nhựa Vân Long" />
    <meta property="article:section" content="Bán hàng, sản phẩm nhựa" />
    <meta property="og:image:type" content="image/png" />
    <meta name="robots" content="noindex,nofollow">
    <meta property="og:url" content="http://honghaecocity.online/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $product->name }}" />
    <meta property="og:description"
        content="{{ $product->short_description }}" />
    <meta property="og:image" content="{{ $product->getFirstMediaUrl('products') }}" />
@endpush
@section('content')
<!-- Start of Main -->
<main class="main mb-10 pb-1">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no">
            <li><a href="/">Trang chủ</a></li>
            <li>Sản phấm</li>
        </ul>
        <ul class="product-nav list-style-none">
            <li class="product-nav-prev">
                <span class="product-nav-popup">
                    <img src="{{ $product->getFirstMediaUrl('products','thumb') }}" alt="Product" width="110"
                        height="110" />
                    <span class="product-name">{{ $product->name }}}</span>
                </span>
            </li>
            <li class="product-nav-next">
                <span class="product-nav-popup">
                    <img src="{{ $product->getFirstMediaUrl('products','thumb') }}" alt="Product" width="110"
                        height="110" />
                    <span class="product-name">{{ $product->name }}}</span>
                </span>
            </li>
        </ul>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="product product-single row">
                        <div class="col-md-6 mb-6">
                            <div class="product-gallery product-gallery-sticky">
                                <div class="swiper-container product-single-swiper swiper-theme nav-inner"
                                    data-swiper-options="{
                                    'navigation': {
                                        'nextEl': '.swiper-button-next',
                                        'prevEl': '.swiper-button-prev'
                                    }
                                }">
                                    <div class="swiper-wrapper row cols-1 gutter-no">
                                        <div class="swiper-slide">
                                            <figure class="product-image">
                                                <img src="{{ $product->getFirstMediaUrl('products') }}"
                                                    data-zoom-image="{{ $product->getFirstMediaUrl('products') }}"
                                                    alt="{{ $product->name }}" width="800" height="900">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-6">
                            <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                <h1 class="product-title">{{ $product->name }}</h1>
                                <div class="product-bm-wrapper">
                                    <div class="product-meta">
                                        <div class="product-categories">
                                            Danh mục:
                                            <span class="product-category"><a
                                                    href="{{ route('products.category', ['category' => $product->category->slug]) }}">{{
                                                    $product->category->name }}</a></span>
                                        </div>
                                        <div class="product-sku">
                                            SKU: <span>{{ $product->slug }}</span>
                                        </div>
                                        <ul class="list-group-item">
                                            <li class="font-size-sm">Tình trạng: {{ $product->quantity == 0 ? 'Hết hàng' : 'Còn hàng' }}</li>
                                            <li class="font-size-sm font-weight-bold">Số lượng: {{ $product->quantity }} sản phẩm</li>
                                        </ul>
                                    </div>
                                </div>

                                <hr class="product-divider">

                                {{-- <div class="product-price"><ins class="new-price">$40.00</ins></div> --}}
                                <div class="product-short-desc">
                                    <p>{{ $product->short_description }}</p>
                                </div>

                                <hr class="product-divider">
                                <div class="fix-bottom product-sticky-content sticky-content">
                                    <div class="product-form container">
                                        <form action="{{ route('products.cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <button type="submit" class="btn btn-primary btn-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Thêm giỏ hàng</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="social-links-wrapper">
                                    <div class="social-links">
                                        <div class="social-icons social-no-color border-thin">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" class="social-icon social-facebook"><i
                                                    class="fab fa-facebook-square"></i></a>
                                            <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" class="social-icon social-twitter"><i
                                                    class="fab fa-twitter-square"></i></a>
                                            <a href="https://plus.google.com/share?url{{ Request::url() }}" class="social-icon social-youtube fab fa-google-plus"></a>
                                        </div>
                                    </div>
                                    <span class="divider d-xs-show"></span>
                                    <div class="product-link-wrapper d-flex">
                                        <a href="#" id="wishlist" data-id="{{ $product->id }}"
                                            class="btn-product-icon btn-wishlist"><span><i
                                                    class="fa fa-heart"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                        <div class="tab-content">
                            <div class="tab-pane active" id="product-tab-description">
                                <div class="row mb-4">
                                    <div class="col-md-12 mb-5">
                                        <h4 class="title tab-pane-title font-weight-bold mb-2">Chi tiết sản phẩm</h4>
                                        <h3 class="mt-3">Thông tin sản phẩm</h3>
                                        <table class="table" border="1px">
                                            <thead>
                                                <tr>
                                                    <th>Màu sắc</th>
                                                    <th>Trọng lượng</th>
                                                    <th>Thể tích</th>
                                                    <th>Vòng đời</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr align="center">
                                                    <td>{{ $product->color }}</td>
                                                    <td>{{ $product->weight }} g</td>
                                                    <td>{{ $product->capacity }} ml</td>
                                                    <td>{{ $product->cycle }} sp/s</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @if ($product->getFirstMedia('product_drawing'))
                                        <h3 class="mt-3">Bản vẽ kỹ thuật</h3>
                                        <div align="center">
                                            <img src="{{ $product->getFirstMediaUrl('product_drawing') }}" width="400"
                                                height="160" class="mt-5 img-fluid" alt="{{ $product->name }}">
                                        </div>
                                        @endif
                                        <h3 class="mt-3">Mô tả sản phẩm</h3>
                                        {!! $product->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="related-product-section">
                        <div class="title-link-wrapper mb-4">
                            <h4 class="title">Sản phẩm liên quan</h4>
                            <a href="/shop" class="btn btn-dark btn-link btn-slide-right btn-icon-right">Xem thêm</a>
                        </div>
                        <div class="swiper-container swiper-theme" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 3
                                },
                                '768': {
                                    'slidesPerView': 4
                                },
                                '992': {
                                    'slidesPerView': 3
                                }
                            }
                        }">
                            <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                @foreach ($related_products as $product)
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ $product->getFirstMediaUrl('products', 'thumb') }}"
                                                alt="{{ $product->name }}" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" id="addToCart" data-id="{{ $product->id }}"
                                                class="btn-product-icon btn-cart" title="Add to cart"><i
                                                    class="fa fa-heart"></i></a>
                                            <a href="#" id="wishlist" data-id="{{ $product->id }}"
                                                class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="{{ route('products.detail', ['product' => $product->slug]) }}"
                                                class="btn-product btn-quickview" title="Quick View">Chi tiết</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a
                                                href="{{ route('products.detail', ['product' => $product->slug]) }}">{{
                                                $product->name }}</a></h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
                <!-- End of Main Content -->
                <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                    <div class="sidebar-content scrollable">
                        <div class="sticky-sidebar">
                            <div class="widget widget-products">
                                <div class="title-link-wrapper mb-2">
                                    <h4 class="title title-link font-weight-bold">Sản phẩm phổ biến</h4>
                                </div>

                                <div class="swiper nav-top">
                                    <div class="swiper-container swiper-theme nav-top" data-swiper-options="{
                                        'slidesPerView': 1,
                                        'spaceBetween': 20,
                                        'navigation': {
                                            'prevEl': '.swiper-button-prev',
                                            'nextEl': '.swiper-button-next'
                                        }
                                    }">
                                        <div class="swiper-wrapper">
                                            @foreach ($random_products as $product)
                                            <div class="widget-col swiper-slide">
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a
                                                            href="{{ route('products.detail', ['product' => $product->slug]) }}">
                                                            <img src="{{ $product->getFirstMediaUrl('products') }}"
                                                                alt="{{ $product->name }}" width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a
                                                                href="{{ route('products.detail', ['product' => $product->slug]) }}">{{
                                                                $product->name }}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- End of Sidebar -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
            $('#wishlist').click(function (e) { 
                e.preventDefault();
                let id = $(this).attr('data-id');

                $.ajax({
                    type: "post",
                    url: "{{ route('wishlist') }}",
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",
                    success: function (response) {
                        toastr.success('Thêm sản phẩm vào danh sách yêu thích thành công', 'Thông báo');
                    },
                    error: function (error) { 
                        toastr.error(error.response, 'Lỗi');
                    }
                });
            });
            $('#addToCart').click(function (e) { 
                e.preventDefault();
                
                let id = $(this).attr('data-id');

                $.ajax({
                    type: "post",
                    url: "{{ route('products.ajax.cart') }}",
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",
                    success: function (response) {
                        toastr.success('Thêm sản phẩm vào giỏ hàng thành công', 'Thông báo');
                    },
                    error: function (error) { 
                        toastr.error(error.response.error, 'Lỗi');
                    }
                });
            });
        });
</script>
@endpush