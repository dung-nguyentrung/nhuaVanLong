@extends('admin.layouts.app')
@push('styles')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title', 'Sản phẩm')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách sản phẩm</h4>
                </div>
                <div>
                    @can('product_delete')     
                    <a href="{{ route('products.trash') }}" title="Thùng rác" class="btn btn-secondary add-list"><i class="fa fa-trash"></i>Thùng rác</a>                   
                    <a href="#" id="deleteAllProductSelected" class="btn btn-danger add-list"><i class="las la-trash"></i>Xóa lựa chọn</a>
                    @endcan
                    @can('product_create')
                    <a href="{{ route('products.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm sản phẩm</a>                        
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
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Trọng lượng</th>
                        <th>Chu kỳ</th>
                        <th>Dung tích</th>
                        <th>Màu sắc</th>
                        <th>Danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>                
                <tbody class="ligth-body">
                    @foreach ($products as $item)
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" value="{{ $item->id }}" class="checkbox-input" name="ids">
                                <label for="ids" class="mb-0"></label>
                            </div>
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $item->getFirstMediaUrl('products') }}" class="img-fluid rounded avatar-50 mr-3" alt="{{ $item->name }}">
                                <div>
                                    {{ $item->name }}                                
                                </div>
                            </div>
                        </td>
                        <td>{{ $item->price }} đ</td>
                        <td>{{ $item->weight }} gam</td>
                        <td>{{ $item->cycle }} s/SP</td>
                        <td>{{ $item->capacity }} ml</td>
                        <td>{{ $item->color }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                @can('product_show')
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="Xem chi tiết" data-original-title="View"
                                    href="{{ route('products.show',['product' => $item->id]) }}"><i class="fa fa-eye mr-0"></i></a>                                    
                                @endcan
                                @can('product_edit')
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="Cập nhật" data-original-title="Edit"
                                    href="{{ route('products.edit',['product' => $item->id]) }}"><i class="fa fa-pen mr-0"></i></a>                                    
                                @endcan
                                @can('product_delete')
                                <form action="{{ route('products.destroy',['product' => $item->id]) }}" method="POST" id="cateForm{{ $item->id }}">
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
    @can('product_delete')
        <script>
            $(document).ready(function () {
    
                $("#selectAll").click(function(){
                    $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
                });

                $("#deleteAllProductSelected").on("click", function () {
                    var ids = [];
                    $.each($("input[name='ids']:checked"), function() {
                        ids.push($(this).val());
                    });

                    $.ajax({
                        type: "DELETE",
                        url: 'products/massDestroy',
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