@extends('admin.layouts.app')

@section('title', 'Tạo đơn hàng')
@push('styles')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
<div class="container-fluid add-form-list">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Đơn hàng</h4>
                </div>
                <div>
                    @can('order_access')
                    <a href="{{ route('orders.index') }}" class="btn btn-primary add-list"></i>Quay lại</a>                        
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="post">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Tên khách hàng</label>
                    <input type="text" name="name" class="form-control" value="{{ $order->name }}">
                </div>
            </div>  
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Công ty khách hàng</label>
                    <input type="text" name="company_name" class="form-control" value="{{ $order->company_name }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Địa chỉ Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $order->email }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Điện thoại</label>
                    <input type="text" name="phone" class="form-control" value="{{ $order->phone }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Địa chỉ cụ thể</label>
                    <input type="text" name="address" class="form-control" value="{{ $order->address }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Tỉnh / Thành phố</label>
                    <select name="province_id" id="province" class="form-control">
                        <option value="{{ $order->province->id }}" selected>{{ $order->province->name }}</option>
                        @foreach ($province as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Quận / Huyện</label>
                    <select name="district_id" id="district" class="form-control">
                        <option value="{{ $order->district->id }}" selected>{{ $order->district->name }}</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Phường / Xã</label>
                    <select name="ward_id" id="ward" class="form-control">
                        <option value="{{ $order->ward->id }}" selected>{{ $order->ward->name }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <button type="submit" class="btn btn-primary">Xác nhận</button>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>    
{!! Toastr::message() !!}
<script>
    $(document).ready(function () {
        $('#search').keyup(function (e) { 
            var url = "{{ route('orders.search') }}";
            $.ajax({
                type: "get",
                url: url,
                data: {
                    search: $(this).val(),
                },
                dataType: "json",
                success: function (response) {
                    $('#lstProducts').html(response);
                }
            });
        });
        $('#province').change(function () { 
            var id = $(this).val();
            var url = "{{ route('orders.sortByProvince', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    $('#district').html(data.output);
                    $('#ward').html(data.outputWard);
                }
            });
        });
        $('#district').change(function () { 
            var id = $(this).val();
            var url = "{{ route('orders.sortByDistrict', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    id: id
                },
                dataType: "json",
                success: function (response) {
                    $('#ward').html(response);
                }
            });
        });
    });
</script>
@endpush