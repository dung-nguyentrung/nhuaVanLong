@extends('admin.layouts.app')

@section('title', $tag->name_vi)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">{{ $tag->name_vi }}</h4>
                </div>
                <div>
                    @can('tag_access')
                    <a href="{{ route('tags.index') }}" class="btn btn-primary add-list"></i>Quay lại</a>                        
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
                        <th>{{ $tag->id }}</th>
                    </tr>
                    <tr>
                        <th>Tên danh mục sản phẩm (VI)</th>
                        <th>{{ $tag->name_vi }}</th>
                    </tr>
                    <tr>
                        <th>Tên danh mục sản phẩm (EN)</th>
                        <th>{{ $tag->name_en }}</th>
                    </tr>
                    <tr>
                        <th>Tên danh mục sản phẩm (JP)</th>
                        <th>{{ $tag->name_jp }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection