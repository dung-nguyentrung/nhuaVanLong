@extends('admin.layouts.app')

@section('title', $post->name)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">{{ $post->name }}</h4>
                </div>
                <div>
                    @can('post_access')
                    <a href="{{ route('posts.index') }}" class="btn btn-primary add-list"></i>Quay lại</a>                        
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
            <table class="table table-bordered mb-0 tbl-server-info" border="1px solid black">
                <tbody class="ligth-body">
                    <tr>
                        <th>Mã</th>
                        <th>{{ $post->id }}</th>
                    </tr>
                    <tr>
                        <th>Danh mục</th>
                        <th>{{ $post->postCategory->name }}</th>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>{{ $post->name }}</th>
                    </tr>
                    <tr>
                        <th>Lượt xem</th>
                        <th>{{ $post->view }} <i class="fa fa-eye"></i></th>
                    </tr> 
                    <tr>
                        <th>Hình ảnh</th>
                        <th><img src="{{ $post->getFirstMediaUrl('posts') }}" width="200" alt="{{ $post->name }}"></th>
                    </tr>
                        <tr>
                            <th>Mô tả sản phẩm</th>
                            <th>{{ $post->short_description }}</th>
                        </tr>
                        <tr>
                            <th>Chi tiết sản phẩm</th>
                            <th>{!! $post->description !!}</th>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection