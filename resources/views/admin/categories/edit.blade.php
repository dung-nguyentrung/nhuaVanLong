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
                                @foreach (config('app.available_locales') as $item)
                                @php
                                    $name = 'name_'.$item;
                                @endphp
                                <div class="form-group">
                                    <label>Tên danh mục sản phẩm ({{ strToUpper($item) }})</label>
                                    <input type="text" value="{{ $category->$name }}" name="name_{{ $item }}" class="form-control" placeholder="Nhập tên danh mục sản phẩm {{ $item }}">
                                    <div class="help-block with-errors"></div>
                                </div>                                                          
                                @endforeach
                                <div class="col-md-4 form-group">
                                    <label>Hình ảnh</label><br>
                                    <input type="file" name="image" onchange="loadPreview(this);">
                                </div>
                                <div class="col-md-8 form-group">
                                    <img id="preview_img" src="{{ $category->getFirstMediaUrl('categories') }}" width="200" alt="Temporary image">
                                </div>        
                                @foreach (config('app.available_locales') as $item)
                                @php
                                    $desc = 'description_'.$item;
                                @endphp
                                    <div class="col-lg-12 form-group">
                                        <label>Mô tả danh mục sản phẩm ({{ strToUpper($item) }})</label>
                                        <textarea name="description_{{ $item }}" class="form-control" rows="4">
                                            {{ $category->$desc }}
                                        </textarea>
                                    </div>
                                @endforeach
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