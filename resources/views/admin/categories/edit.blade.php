@extends('admin.layouts.app')

@section('title', 'Cập nhật danh mục sản phẩm')
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
                        <h4 class="card-title">Cập nhật danh mục sản phẩm</h4>
                    </div>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary float-right">Quay lại</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', ['category' => $category->id]) }}" enctype="multipart/form-data" method="POST" data-toggle="validator">
                        @csrf
                        @method('put')
                        <div class="row">         
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tên danh mục sản phẩm</label>
                                    <input type="text" value="{{ $category->name }}" name="name" class="form-control" placeholder="Nhập tên danh mục sản phẩm">
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