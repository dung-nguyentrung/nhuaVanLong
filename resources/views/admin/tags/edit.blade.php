@extends('admin.layouts.app')

@section('title', 'Cập nhật chủ đề bài viết')
@push('styles')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
<div class="container-fluid add-form-list">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Cập nhật chủ đề bài viết</h4>
                    </div>
                    <a href="{{ route('tags.index') }}" class="btn btn-primary float-right">Quay lại</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('tags.update', ['tag' => $tag->id]) }}" method="POST" data-toggle="validator">
                        @csrf
                        @method('put')
                        <div class="row">         
                            <div class="col-md-12">
                                @foreach (config('app.available_locales') as $item)
                                @php
                                    $name = 'name_'.$item;
                                @endphp
                                <div class="form-group">
                                    <label>Tên chủ đề bài viết ({{ strToUpper($item) }})</label>
                                    <input type="text" value="{{ $tag->$name }}" name="name_{{ $item }}" class="form-control" placeholder="Nhập tên chủ đề bài viết {{ $item }}">
                                    <div class="help-block with-errors"></div>
                                </div>                                                          
                                @endforeach
                            </div>                                 
                        </div>                            
                        <button type="submit" class="btn btn-primary mr-2">Lưu lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>
@endsection
@push('scripts')
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}    
@endpush