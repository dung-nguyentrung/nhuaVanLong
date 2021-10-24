@extends('layouts.base')

@section('content')
<!-- Start of Main -->
<main class="main cart">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="active"><a href="/cart">Giỏ hàng</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg mb-10">
                <div class="col-lg-8 pr-lg-4 mb-6">
                    <table class="shop-table cart-table">
                        <thead>
                            <tr>
                                <th class="product-name"><span>Sản phẩm</span></th>
                                <th></th>
                                <th class="product-price"><span>Giá</span></th>
                                <th class="product-quantity"><span>Số lượng</span></th>
                                <th></th>
                                <th class="product-subtotal"><span>Tổng tiền</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::instance('cart')->content() as $item)
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="product-default.html">
                                            <figure>
                                                <img src="{{ $item->model->getFirstMediaUrl('products') }}" alt="{{ $item->name }}"
                                                    width="300" height="338">
                                            </figure>
                                        </a>
                                        <button type="submit" class="btn btn-close"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="{{ route('products.detail', ['product' => $item->model->slug]) }}">
                                        {{ $item->model->name }}
                                    </a>
                                </td>
                                <td class="product-price"><span class="amount">{{ number_format($item->model->price) }} đ</span></td>
                                <td class="product-quantity">
                                    <form action="{{ route('cart.update') }}" method="post">
                                        @csrf
                                    <div class="form-group">
                                        <input class="form-control" name="quantity" width="3" type="number" value="{{ $item->qty }}" min="1" max="100000">
                                        <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-arrow-up"></i></button>
                                </form>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">{{ number_format($item->qty * $item->model->price) }} đ</span>
                                </td>
                            </tr>                                
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tổng tiền:</th>
                                <th class="product-subtotal">
                                    <span class="amount">{{ Cart::subtotal(0,'',',') }}</span> đồng
                                </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>



                    <div class="cart-action mb-6">
                        <a href="/shop" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="fa fa-long-arrow-alt-right"></i>Tiếp tục mua hàng</a>
                        <form action="{{ route('cart.destroy') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-rounded btn-default btn-clear">Xóa giỏ hàng</button>
                        </form>
                    </div>

                    <a href="/checkout" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="far fa-credit-card"></i>Đặt hàng</a>
                </div>
                <div class="col-lg-4">
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
                                        <div class="swiper-container swiper-theme nav-top" data-swiper-options = "{
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
                                                            <a href="{{ route('products.detail', ['product' => $product->slug]) }}">
                                                                <img src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->name }}"
                                                                    width="100" height="113" />
                                                            </a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name">
                                                                <a href="{{ route('products.detail', ['product' => $product->slug]) }}">{{ $product->name }}</a>
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
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->
@endsection