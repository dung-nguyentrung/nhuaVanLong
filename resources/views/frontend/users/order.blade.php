@extends('layouts.base')

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
                                            <th>Mã Đơn hàng</th>
                                            <th>Khách hàng</th>
                                            <th>Điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Thành tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Hợp đồng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr align="center">
                                            <td>DHVL{{ $order->id }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ $order->address }}, {{ $order->ward->name }}, {{ $order->district->name }}, {{ $order->province->name }}</td>
                                            <td>{{ number_format($order->total) }} đồng</td>
                                            <td>{{ $order->status }}</td>
                                            <td><a href="{{ route('user.contract', ['order' => $order->id]) }}" class="btn btn-primary">Xem ngay</a></td>
                                        </tr>      
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng tiền</th>
                                        </tr> 
                                            @foreach (App\Models\OrderItem::where('order_id', $order->id)->with('product')->get() as $item)
                                                <tr align="center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><img src="{{ $item->product->getFirstMediaUrl('products') }}" alt="{{ $item->product->name }}" width="200"></td>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td>{{ $item->quantity }} sản phẩm</td>
                                                    <td>{{ number_format($item->price) }} đồng/sản phẩm</td>
                                                    <td>{{ number_format($item->quantity * $item->price) }} đồng</td>
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