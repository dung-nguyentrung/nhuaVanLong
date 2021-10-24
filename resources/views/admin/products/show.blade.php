@extends('admin.layouts.app')

@section('title', $product->name)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">{{ $product->name }}</h4>
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
                        <th>{{ $product->category->name }}</th>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>{{ $product->name }}</th>
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
                        <th><img src="{{ $product->getFirstMediaUrl('products') }}" width="200" alt="{{ $product->name }}"></th>
                    </tr>
                    <tr>
                        <th>Bản vẽ kỹ thuật</th>
                        <th><img src="{{ $product->getFirstMediaUrl('product_drawing') }}" width="200" alt="{{ $product->name }}"></th>
                    </tr>
                        <tr>
                            <th>Mô tả sản phẩm</th>
                            <th>{{ $product->short_description }}</th>
                        </tr>
                        <tr>
                            <th>Chi tiết sản phẩm</th>
                            <th>{!! $product->description !!}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection