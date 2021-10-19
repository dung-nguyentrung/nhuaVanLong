@extends('admin.layouts.app')

@section('title', $testimonial->name_vi)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">{{ $testimonial->name_vi }}</h4>
                </div>
                <div>
                    @can('testimonial_access')
                    <a href="{{ route('testimonials.index') }}" class="btn btn-primary add-list"></i>Quay lại</a>                        
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
            <table class="table table-bordered" border="1px ">
                <thead class="ligth-body">
                </thead>
                    <tr>
                        <td>Thuộc tính</td>
                        <td>Giá trị</td>
                    </tr>
                <tbody>
                    <tr>
                        <td>Mã</td>
                        <td>{{ $testimonial->id }}</td>
                    </tr>
                    <tr>
                        <td>Tên khách hàng</td>
                        <td>{{ $testimonial->name }}</td>
                    </tr>
                    <tr>
                        <td>Chức vụ</td>
                        <td>{{ $testimonial->mission }}</td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td>
                            <img src="{{ $testimonial->getFirstMediaUrl('testimonials') }}" width="200" alt="{{ $testimonial->name_vi }}">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection