@extends('admin.layouts.app')

@section('title', $category->name)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">{{ $category->name }}</h4>
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
                        <th>Tên danh mục sản phẩm</th>
                        <th>{{ $category->name }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection