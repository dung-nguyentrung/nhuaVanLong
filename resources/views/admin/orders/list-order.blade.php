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
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody class="ligth-body">
                @foreach ($orders as $item)
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
                    <td>{{ $item->address }}, {{ $item->ward->name }}, {{ $item->district->name }}, {{ $item->province->name }}
                    </td>
                    <td>{{ number_format($item->total) }} đồng</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <div class="d-flex align-items-center list-action">
                            @can('order_show')
                            <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="Xem chi tiết"
                                data-original-title="View" href="{{ route('orders.show',['order' => $item->id]) }}"><i
                                    class="fa fa-eye mr-0"></i></a>
                            @endcan
        
                            @can('order_edit')
                            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="Cập nhật"
                                data-original-title="Edit" href="{{ route('orders.edit',['order' => $item->id]) }}"><i
                                    class="fa fa-pen mr-0"></i></a>
                            @endcan
                            @can('order_receipt')
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#receipt{{ $item->id }}">
                                <i class="fas fa-money-check"></i>
                            </button>
                            @endcan
                            @can('order_delete')
                            <form action="{{ route('orders.destroy',['order' => $item->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" title="Xóa" type="submit"><i
                                        class="fa fa-trash-alt mr-0"></i></button>
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

<!-- Modal -->
@foreach ($orders as $item)
<div class="modal fade" id="receipt{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="receiptLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="receiptLabel">Công nợ đơn hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tổng tiền đơn hàng: {{ number_format($item->receipt->total) }} đồng</p>
                <p>Đã trả: {{ number_format($item->receipt->paid) }} đồng</p>
                <p>Còn nợ: {{ number_format($item->receipt->in_debt) }} đồng</p>
                @if($item->receipt->refund > 0)
                <p>Hoàn lại: {{ number_format($item->receipt->refund) }} đồng</p>                    
                @endif
                <form action="{{ route('receipt.debt', ['receipt' => $item->receipt->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Khách trả hôm nay</label>
                        <input type="text" class="form-control" name="paid">
                    </div>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach