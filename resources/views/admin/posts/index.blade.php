@extends('admin.layouts.app')
@push('styles')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title', 'Bài viết')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách bài viết</h4>
                </div>
                <div>
                    @can('post_delete')     
                    <a href="{{ route('posts.trash') }}" title="Thùng rác" class="btn btn-secondary add-list"><i class="fa fa-trash"></i>Thùng rác</a>                   
                    <a href="#" id="deleteAllPostSelected" class="btn btn-danger add-list"><i class="las la-trash"></i>Xóa lựa chọn</a>
                    @endcan
                    @can('post_create')
                    <a href="{{ route('posts.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm bài viết</a>                        
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
                        <th>Bài viết</th>
                        <th>Lượt xem</th>
                        <th>Tình trạng</th>
                        <th>Danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>                
                <tbody class="ligth-body">
                    @foreach ($posts as $item)
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
                                <img src="{{ $item->getFirstMediaUrl('posts') }}" class="img-fluid rounded avatar-50 mr-3" alt="{{ $item->name }}">
                                <div>
                                    {{ $item->name }}                                
                                </div>
                            </div>
                        </td>
                        <td>{{ $item->view }} <i class="fa fa-eye"></i></td>
                        <td id="status{{ $item->id }}">
                            @if ($item->status == 1)
                                <form action="{{ route('posts.hideStatus', ['post' => $item->id]) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <button type="submit" title="Click để ẩn bài viết" class="btn btn-link text-success"><i class="fa fa-eye"></i>Hiển thị</button>
                                </form>
                            @else
                            <form action="{{ route('posts.showStatus', ['post' => $item->id]) }}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit" title="Click để hiển thị bài viết" class="btn btn-link text-danger"><i class="fa fa-eye-slash">Ẩn</i></button>
                            </form>                                
                            @endif
                        </td>
                        <td>{{ $item->postCategory->name }}</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                @can('post_show')
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="Xem chi tiết" data-original-title="View"
                                    href="{{ route('posts.show',['post' => $item->id]) }}"><i class="fa fa-eye mr-0"></i></a>                                    
                                @endcan
                                @can('post_edit')
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="Cập nhật" data-original-title="Edit"
                                    href="{{ route('posts.edit',['post' => $item->id]) }}"><i class="fa fa-pen mr-0"></i></a>                                    
                                @endcan
                                @can('post_delete')
                                <form action="{{ route('posts.destroy',['post' => $item->id]) }}" method="POST" id="cateForm{{ $item->id }}">
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
    @can('post_delete')
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    
                $("#selectAll").click(function(){
                    $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
                });

                $("#deleteAllPostSelected").on("click", function () {
                    var ids = [];
                    $.each($("input[name='ids']:checked"), function() {
                        ids.push($(this).val());
                    });

                    $.ajax({
                        type: "DELETE",
                        url: 'posts/massDestroy',
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