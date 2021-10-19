@extends('admin.layouts.app')

@section('title', $post->name_vi)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">{{ $post->name_vi }}</h4>
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
                        <th>{{ $post->postCategory->name_vi }}</th>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm (VI)</th>
                        <th>{{ $post->name_vi }}</th>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm (EN)</th>
                        <th>{{ $post->name_en }}</th>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm (JP)</th>
                        <th>{{ $post->name_jp }}</th>
                    </tr>
                    <tr>
                        <th>Lượt xem</th>
                        <th>{{ $post->view }} <i class="fa fa-eye"></i></th>
                    </tr> 
                    <tr>
                        <th>Hình ảnh</th>
                        <th><img src="{{ $post->getFirstMediaUrl('posts') }}" width="200" alt="{{ $post->name_vi }}"></th>
                    </tr>
                    @foreach (config('app.available_locales') as $item)
                    @php
                        $short = 'short_description_'.$item;
                    @endphp
                        <tr>
                            <th>Mô tả sản phẩm ({{ strToUpper($item) }})</th>
                            <th>{{ $post->$short }}</th>
                        </tr>
                    @endforeach
                    @foreach (config('app.available_locales') as $item)
                    @php
                        $desc = 'description_'.$item;
                    @endphp
                        <tr>
                            <th>Chi tiết sản phẩm ({{ strToUpper($item) }})</th>
                            <th>{!! $post->$desc !!}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection