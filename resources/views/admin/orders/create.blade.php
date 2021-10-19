@extends('admin.layouts.app')

@section('title', 'Tạo đơn hàng')
@push('styles')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
<div class="container-fluid add-form-list">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Chi tiết đơn hàng</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tìm kiếm</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="row" id="lstProducts">
                            @foreach ($products as $id => $item)
                            <div class="col-md-3">
                                <a class="addItem" href="#" data-value="{{ $item->id }}">
                                    <img src="{{ $item->getFirstMediaUrl('products') }}" width="150" alt="{{ $item->name_vi}}">
                                    <p class="text-center">{{ $item->name_vi }}</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <form action="{{ route('orders.store') }}" method="POST" data-toggle="validator">
                        @csrf
                    <table class="table mb-0 tbl-server-info" id="lstData">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body" id="order_items">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Thông tin đơn hàng</h4>
                    </div>
                </div>
                <div class="card-body">                                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tên khách hàng *</label>
                                    <select name="customer" class="selectpicker form-control" data-style="py-0" required>
                                        {{-- @foreach ($customers as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>                                            
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Điện thoại</label>
                                    <input type="text" name="phone" placeholder="Nhập điện thoại khách hàng" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Địa chỉ giao hàng</label>
                                    <input type="text" name="address" placeholder="Nhập địa chỉ giao hàng" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tỉnh / Thành phố</label>
                                    <select name="province" id="province" class="form-control">
                                        <option value="0">-- Chọn --</option>
                                        @foreach ($province as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Quận / Huyện</label>
                                    <select name="district" id="district" class="form-control">
                                        <option value="0">-- Chọn --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phường / Xã</label>
                                    <select name="ward" id="ward" class="form-control">
                                        <option value="0">-- Chọn --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tổng tiền</label>
                                    <input type="number" name="subtotal" id="subtotal" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>VAT</label>
                                    <input type="number" class="form-control" name="tax" required id="tax" placeholder="Để trống nếu không có thuế">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phí vận chuyển</label>
                                    <input type="number" class="form-control" name="shipping" required id="shipping" placeholder="Để trống nếu không có phí vận chuyển">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>                          
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Thành tiền</label>
                                    <input type="number" class="form-control" required id="total" name="total">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>                            
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Tạo đơn hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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