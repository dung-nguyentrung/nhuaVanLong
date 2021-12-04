@extends('admin.layouts.app')

@section('title', 'Thêm khách hàng')
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
                        <h4 class="card-title">Thêm khách hàng</h4>
                    </div>
                    <a href="{{ route('customers.index') }}" class="btn btn-primary float-right">Quay lại</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.store') }}" enctype="multipart/form-data" method="POST" data-toggle="validator">
                        @csrf
                        <div class="row">         
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nhập tên khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>       
                            </div>  
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Điện thoại</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Nhập điện thoại khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Nhập email khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Công ty</label>
                                    <input type="text" name="company_name" class="form-control" placeholder="Nhập công ty khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Địa chỉ công ty</label>
                                    <input type="text" name="company_address" class="form-control" placeholder="Nhập địa chỉ công ty khách hàng">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tài khoản công ty</label>
                                    <input type="text" name="bank_account" class="form-control" placeholder="Nhập tài khoản công ty khách hàng">
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

    <script>
        function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
@endpush