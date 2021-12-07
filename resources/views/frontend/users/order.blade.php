@extends('layouts.base')
@section('title', 'Đơn hàng')
@section('content')
<!-- Start of Main -->
<main class="main">
    <x-page-header title="Tài khoản của bạn" />

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <span>Xin chào</span> <h2>{{ Auth::user()->name }}</h2>
            <div class="tab ">
                <x-user-nav-bar />

                <div class="tab-content mb-6">
                    <div class="tab-pane active in" id="account-dashboard">

                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped" border="1px">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng tiền</th>
                                            <td>Ngày đặt hàng</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)                                              
                                            @foreach (App\Models\OrderItem::where('order_id', $order->id)->with('product')->get() as $item)
                                                <tr align="center">
                                                    <td>Đơn hàng: #{{ $order->id }}</td>
                                                    <td><img src="{{ $item->product->getFirstMediaUrl('products') }}" alt="{{ $item->product->name }}" width="200"></td>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td>{{ $item->quantity }} sản phẩm</td>
                                                    <td>{{ number_format($item->price) }} đồng/sản phẩm</td>
                                                    <td>{{ number_format($item->quantity * $item->price) }} đồng</td>
                                                    <td>{{ $order->created_at->format('d/m/y') }}</td>
                                                </tr>
                                            @endforeach                                 
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->
@endsection