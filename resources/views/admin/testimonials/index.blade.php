@extends('admin.layouts.app')
@php
    $name = 'name_'.config('app.locale');
@endphp
@push('styles')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title', 'Đánh giá khách hàng')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách đánh giá khách hàng</h4>
                </div>
                <div>
                    @can('testimonial_delete')                        
                    <a href="#" id="deleteAll" class="btn btn-danger add-list"><i class="las la-trash"></i>Xóa lựa chọn</a>
                    @endcan
                    @can('testimonial_create')
                    <a href="{{ route('testimonials.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm đánh giá khách hàng</a>                        
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
            <table class="data-table table mb-0 tbl-server-info">
                <thead class="bg-white text-uppercase">
                    <tr class="ligth ligth-data">
                        <th>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="selectAll">
                                <label for="selectAll" class="mb-0"></label>
                            </div>
                        </th>
                        <th>STT</th>            
                        <th>hình ảnh</th>       
                        <th>Tên khách hàng</th>   
                        <th>Chức vụ</th>
                        <th>Đánh giá</th>                     
                        <th>Hành động</th>
                    </tr>
                </thead>                
                <tbody class="ligth-body">
                    @foreach ($testimonials as $item)
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" value="{{ $item->id }}" class="checkbox-input" name="ids">
                                <label for="ids" class="mb-0"></label>
                            </div>
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ $item->getFirstMediaUrl('testimonials') }}" width="200" alt="{{ $item->$name }}">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->mission }}</td>
                        <td>{{ $item->testimonial }}</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                @can('testimonial_show')
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="Xem chi tiết" data-original-title="View"
                                    href="{{ route('testimonials.show',['testimonial' => $item->id]) }}"><i class="fa fa-eye mr-0"></i></a>                                    
                                @endcan
                                @can('testimonial_edit')
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="Cập nhật" data-original-title="Edit"
                                    href="{{ route('testimonials.edit',['testimonial' => $item->id]) }}"><i class="fa fa-pen mr-0"></i></a>                                    
                                @endcan
                                @can('testimonial_delete')
                                <form action="{{ route('testimonials.destroy',['testimonial' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" title="Xóa" type="submit"><i class="fa fa-trash-alt mr-0"></i></button>
                                </form>                                    
                                @endcan
                            </div>
                        </td>
                    </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}    
    @can('testimonial_delete')
        <script>
            $(document).ready(function () {
    
                $("#selectAll").click(function(){
                    $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
                });

                $("#deleteAll").on("click", function () {
                    var ids = [];
                    $.each($("input[name='ids']:checked"), function() {
                        ids.push($(this).val());
                    });

                    $.ajax({
                        type: "DELETE",
                        url: 'testimonials/massDestroy',
                        data: {
                            ids: ids,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: "json",
                        success: function (response) {
                            location.reload(); 
                        }
                    });
                });
                
            });
        </script>
    @endcan
@endpush