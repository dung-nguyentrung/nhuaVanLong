@extends('admin.layouts.app')
@push('styles')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title', 'Khách hàng')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách khách hàng</h4>
                </div>
                <div>
                    @can('customer_delete')                        
                    <a href="#" id="deleteAll" class="btn btn-danger add-list"><i class="las la-trash"></i>Xóa lựa chọn</a>
                    @endcan
                    @can('customer_create')
                    <a href="{{ route('customers.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm khách hàng</a>                        
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
                        <th>Tên khách hàng</th>   
                        <th>Điện thoại</th>                     
                        <th>Email</th>
                        <th>Công ty</th>
                        <th>Địa chỉ công ty</th>
                        <th>Tài khoản ngân hàng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>                
                <tbody class="ligth-body">
                    @foreach ($customers as $item)
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" value="{{ $item->id }}" class="checkbox-input" name="ids">
                                <label for="ids" class="mb-0"></label>
                            </div>
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->company_name }}</td>
                        <td>{{ $item->company_address }}</td>
                        <td>{{ $item->bank_account }}</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                @can('customer_show')
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="Xem chi tiết" data-original-title="View"
                                    href="{{ route('customers.show',['customer' => $item->id]) }}"><i class="fa fa-eye mr-0"></i></a>                                    
                                @endcan
                                @can('customer_edit')
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="Cập nhật" data-original-title="Edit"
                                    href="{{ route('customers.edit',['customer' => $item->id]) }}"><i class="fa fa-pen mr-0"></i></a>                                    
                                @endcan
                                @can('customer_delete')
                                <form action="{{ route('customers.destroy',['customer' => $item->id]) }}" method="POST">
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
    @can('customer_delete')
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
                        url: 'customers/massDestroy',
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