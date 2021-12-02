@extends('layouts.base')
@section('title', 'Sản phẩm')
@section('content')
<!-- Start of Main -->
<main class="main">
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/shop">Sản phẩm</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb-nav -->

    <div class="page-content mb-10">
        <div class="container">
            <!-- Start of Shop Content -->
            <div class="shop-content row gutter-lg">
                <!-- Start of Sidebar, Shop Sidebar -->
                <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                    <!-- Start of Sidebar Overlay -->
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="shop-boxed-banner.html#"><i class="close-icon"></i></a>

                    <!-- Start of Sidebar Content -->
                    <div class="sidebar-content scrollable">
                        <x-category />
                    </div>
                    <!-- End of Sidebar Content -->
                </aside>
                <!-- End of Shop Sidebar -->

                <!-- Start of Main Content -->
                <div class="main-content">
                    <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                        @foreach ($products as $product)
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ route('products.detail', ['product' => $product->slug]) }}">
                                        <img src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->name }}" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" data-id="{{ $product->id }}" class="addToCart btn-product-icon btn-cart"
                                            title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                        <a href="#" data-id="{{ $product->id }}" class="addToWishlist btn-product-icon btn-wishlist"
                                            title="Wishlist"><i class="fa fa-heart"></i></a>
                                        <a href="{{ route('products.detail', ['product' => $product->slug]) }}" class="btn-product-icon btn-quickview"
                                            title="Quick View"><i class="fa fa-info-circle"></i></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="{{ route('products.category', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="{{ route('products.detail', ['product' => $product->slug]) }}">{{ $product->name }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>                            
                        @endforeach
                    </div>

                    <div class="toolbox toolbox-pagination justify-content-between">
                        <p class="showing-info mb-2 mb-sm-0">
                        </p>
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Shop Content -->
        </div>
    </div>
</main>
<!-- End of Main -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.addToWishlist').click(function (e) { 
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
            $('.addToCart').click(function (e) { 
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