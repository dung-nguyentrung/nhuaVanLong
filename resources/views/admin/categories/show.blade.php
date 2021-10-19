@extends('admin.layouts.app')

@section('title', $category->name_vi)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">{{ $category->name_vi }}</h4>
                </div>
                <div>
                    @can('category_access')
                    <a href="{{ route('categories.index') }}" class="btn btn-primary add-list"></i>Quay lại</a>                        
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
            <table class="table table-bordered mb-0 tbl-server-info" border="1px">
                <tbody class="ligth-body">
                    <tr>
                        <th>Mã</th>
                        <th>{{ $category->id }}</th>
                    </tr>
                    <tr>
                        <th>Tên danh mục sản phẩm (VI)</th>
                        <th>{{ $category->name_vi }}</th>
                    </tr>
                    <tr>
                        <th>Tên danh mục sản phẩm (EN)</th>
                        <th>{{ $category->name_en }}</th>
                    </tr>
                    <tr>
                        <th>Tên danh mục sản phẩm (JP)</th>
                        <th>{{ $category->name_jp }}</th>
                    </tr>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>
                            <img src="{{ $category->getFirstMediaUrl('categories') }}" width="200" alt="{{ $category->name_vi }}">
                        </th>
                    </tr>
                    <tr>
                        <th>Chi tiết danh mục sản phẩm (VI)</th>
                        <th>{{ $category->description_vi }}</th>
                    </tr>
                    <tr>
                        <th>Chi tiết danh mục sản phẩm (EN)</th>
                        <th>{{ $category->description_en }}</th>
                    </tr>
                    <tr>
                        <th>Chi tiết danh mục sản phẩm (JP)</th>
                        <th>{{ $category->description_jp }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection