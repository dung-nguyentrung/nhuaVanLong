@extends('admin.layouts.app')

@section('title', 'Cập nhật khách hàng')
@push('styles')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
<div class="container-fluid add-form-list">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Cập nhật khách hàng</h4>
                    </div>
                    <a href="{{ route('customers.index') }}" class="btn btn-primary float-right">Quay lại</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.update', ['customer' => $customer->id]) }}" enctype="multipart/form-data" method="POST" data-toggle="validator">
                        @csrf
                        @method('put')
                        <div class="row">         
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <input type="text" name="name" value="{{ $customer->name }}" class="form-control" placeholder="Nhập tên khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Điện thoại</label>
                                    <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" placeholder="Nhập điện thoại khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ $customer->email }}" class="form-control" placeholder="Nhập email khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="address" value="{{ $customer->address }}" class="form-control" placeholder="Nhập địa chỉ khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Công ty</label>
                                    <input type="text" name="company_name" value="{{ $customer->company_name }}" class="form-control" placeholder="Nhập công ty khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Địa chỉ công ty</label>
                                    <input type="text" name="company_address" value="{{ $customer->company_address }}" class="form-control" placeholder="Nhập địa chỉ công ty khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tài khoản công ty</label>
                                    <input type="text" name="bank_account" value="{{ $customer->bank_account }}" class="form-control" placeholder="Nhập tài khoản công ty khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>                                 
                        </div>                            
                        <button type="submit" class="btn btn-primary mr-2">Lưu lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>
@endsection
@push('scripts')
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}    
@endpush