@extends('admin.layouts.app')

@section('title', $product->name_vi)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">{{ $product->name_vi }}</h4>
                </div>
                <div>
                    @can('product_access')
                    <a href="{{ route('products.index') }}" class="btn btn-primary add-list"></i>Quay lại</a>                        
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
                        <th>{{ $product->id }}</th>
                    </tr>
                    <tr>
                        <th>Danh mục</th>
                        <th>{{ $product->category->name_vi }}</th>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm (VI)</th>
                        <th>{{ $product->name_vi }}</th>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm (EN)</th>
                        <th>{{ $product->name_en }}</th>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm (JP)</th>
                        <th>{{ $product->name_jp }}</th>
                    </tr>
                    <tr>
                        <th>Trọng lượng</th>
                        <th>{{ $product->weight }} gam</th>
                    </tr>
                    <tr>
                        <th>Dung tích</th>
                        <th>{{ $product->capacity }} ml</th>
                    </tr>
                    <tr>
                        <th>Chu kỳ sản phẩm</th>
                        <th>{{ $product->cycle }}s/SP</th>
                    </tr>
                    <tr>
                        <th>Giá tiền</th>
                        <th>{{ $product->price }} đ</th>
                    </tr>
                    <tr>
                        <th>Số lượng</th>
                        <th>{{ $product->name_jp }}</th>
                    </tr>
                    <tr>
                        <th>Hình ảnh</th>
                        <th><img src="{{ $product->getFirstMediaUrl('products') }}" width="200" alt="{{ $product->name_vi }}"></th>
                    </tr>
                    <tr>
                        <th>Bản vẽ kỹ thuật</th>
                        <th><img src="{{ $product->getFirstMediaUrl('product_drawing') }}" width="200" alt="{{ $product->name_vi }}"></th>
                    </tr>
                    @foreach (config('app.available_locales') as $item)
                    @php
                        $short = 'short_description_'.$item;
                    @endphp
                        <tr>
                            <th>Mô tả sản phẩm ({{ strToUpper($item) }})</th>
                            <th>{{ $product->$short }}</th>
                        </tr>
                    @endforeach
                    @foreach (config('app.available_locales') as $item)
                    @php
                        $desc = 'description_'.$item;
                    @endphp
                        <tr>
                            <th>Chi tiết sản phẩm ({{ strToUpper($item) }})</th>
                            <th>{!! $product->$desc !!}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection