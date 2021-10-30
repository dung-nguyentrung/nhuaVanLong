@extends('admin.layouts.app')

@section('title', 'Đổi mật khẩu')
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
                        <h4 class="card-title">Đổi mật khẩu</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.password') }}" method="POST" data-toggle="validator">
                        @csrf
                        @method('patch')
                        <div class="row">         
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mật khẩu hiện tại</label>
                                    <input type="password" name="old_password" class="form-control">
                                    <div class="help-block with-errors"></div>
                                </div>       
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" name="password" class="form-control">
                                    <div class="help-block with-errors"></div>
                                </div>       
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu</label>
                                    <input type="password" name="password_confirmation" class="form-control">
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