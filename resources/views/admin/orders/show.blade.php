@extends('admin.layouts.app')

@section('title', 'Chi tiết đơn hàng')
@push('styles')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Đơn hàng</h4>
                </div>
                <div>
                    <a href="{{ route('orders.contract', ['order' => $order->id]) }}" class="btn btn-success add-list">Hợp đồng</a>
                    @can('order_edit')
                    <a href="{{ route('orders.edit', ['order' => $order->id]) }}" class="btn btn-success add-list">Cập nhật đơn hàng</a>
                    @endcan
                    @can('order_access')
                    <a href="{{ route('orders.index') }}" class="btn btn-primary add-list"></i>Quay lại</a>                        
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <th>Mã đơn hàng</th>
                    <th>Công ty</th>
                    <th>Tên khách hàng</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Thuế</th>
                    <th>Thành tiền</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->company_name }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}, {{ $order->ward->name }}, {{ $order->district->name }}, {{ $order->province->name }}</td>
                        <td>{{ number_format($order->subtotal) }} đồng</td>
                        <td>{{ number_format($order->tax) }} đồng</td>
                        <td>{{ number_format($order->total) }} đồng</td>
                    </tr>
                </tbody>
            </table>
            <h5>Chi tiết đơn hàng</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ $item->product->getFirstMediaUrl('products') }}" width="200" alt="{{ $item->product->name }}"></td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price) }} đồng</td>
                        <td>{{ number_format($item->quantity * $item->price) }} đồng</td>
                    </tr>                        
                    @endforeach
                </tbody>
            </table>
            <p>Trạng thái: <span class="text-primary">{{ $order->status }}</span></p>
            <form action="{{ route('orders.confirm', ['order' => $order->id]) }}" method="post">
                @csrf
                @method('patch')
                <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>    
{!! Toastr::message() !!}
@endpush