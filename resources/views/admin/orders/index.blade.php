@extends('admin.layouts.app')
@push('styles')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title', 'Danh mục sản phẩm')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách danh mục sản phẩm</h4>
                </div>
                <div>
                    @can('order_delete')                        
                    <a href="#" id="deleteAll" class="btn btn-danger add-list"><i class="las la-trash"></i>Xóa lựa chọn</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <h6>Sắp xếp theo:</h6>
                <input type="radio" checked name="sorting" id="all" value="">
                <label for="all">Tất cả</label>
                <input type="radio" class="ml-3" name="sorting" id="confirmed" value="Xác nhận">
                <label for="confirmed">Đã xác nhận</label>
                <input type="radio" class="ml-3" name="sorting" id="pending" value="Đang chờ xử lý">
                <label for="pending">Đang chờ xử lý</label>
                <input type="radio" class="ml-3" name="sorting" id="done" value="Đã thanh lý">
                <label for="done">Đã thanh lý</label>
            </div>
        </div>
        <div id="order-index">
            @include('admin.orders.list-order', ['orders' => $orders])
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}   
    @can('order_delete')
        <script>
            $(document).ready(function () {

                $('input:radio[name="sorting"]').change(function (e) { 
                    e.preventDefault();
                    let value = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "/admin/orders/sorting",
                        data: {
                            value: value,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: "json",
                        success: function (response) {
                            $('#order-index').html(response.view);
                        }
                    });
                });
    
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
                        url: 'orders/massDestroy',
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