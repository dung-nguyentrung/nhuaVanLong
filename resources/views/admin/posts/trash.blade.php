@extends('admin.layouts.app')

@push('styles')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title', 'Thùng rác bài viết')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách bài viết trong thùng rác</h4>
                </div>
                <div>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary add-list">Quay lại</a>     
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
                        <td>{{ $item->postCategory->name }}</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                @can('post_restore')
                                <form action="{{ route('posts.restore',['post' => $item->id]) }}" method="POST" id="cateForm{{ $item->id }}">
                                    @csrf
                                    <button class="btn btn-success mr-3" title="Khôi phục" type="submit"><i class="fa fa-trash-restore mr-0"></i></button>
                                </form>                                    
                                @endcan
                                @can('post_delete')
                                <form action="{{ route('posts.forceDelete',['post' => $item->id]) }}" method="POST" id="cateForm{{ $item->id }}">
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
@endpush