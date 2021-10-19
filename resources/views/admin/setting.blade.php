@extends('admin.layouts.app')

@section('title', 'Thông tin website')
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
                        <h4 class="card-title">Thông tin website</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('settings.store') }}" method="POST" data-toggle="validator">
                        @csrf
                        <div class="row">         
                            <div class="col-md-12">
                                @foreach (config('app.available_locales') as $item)
                                @php
                                    $desc = 'description_'.$item;
                                @endphp
                                <div class="form-group">
                                    <label>Mô tả website({{ strToUpper($item) }})</label>
                                    <input type="text" name="description_{{ $item }}" class="form-control" value="{{ $setting->$desc ?? '' }}">
                                    <div class="help-block with-errors"></div>
                                </div>                                                          
                                @endforeach
                            </div> 
                            <div class="form-group col-lg-4">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $setting->email ?? '' }}">
                                <div class="help-block with-errors"></div>
                            </div> 
                            <div class="form-group col-lg-4">
                                <label>Điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{ $setting->phone ?? '' }}">
                                <div class="help-block with-errors"></div>
                            </div> 
                            <div class="form-group col-lg-4">
                                <label>Fax</label>
                                <input type="text" name="fax" class="form-control" value="{{ $setting->fax ?? '' }}">
                                <div class="help-block with-errors"></div>
                            </div>  
                            <div class="col-md-12">
                                @foreach (config('app.available_locales') as $item)
                                @php
                                    $address = 'address_'.$item;
                                @endphp
                                <div class="form-group">
                                    <label>Địa chỉ công ty {{ strToUpper($item) }})</label>
                                    <input type="text" name="address_{{ $item }}" class="form-control" value="{{ $setting->$address ?? '' }}">
                                    <div class="help-block with-errors"></div>
                                </div>                                                          
                                @endforeach
                            </div>  
                            <div class="form-group col-lg-12">
                                <label>Giờ mở cửa</label>
                                <input type="text" name="open_time" class="form-control" value="{{ $setting->open_time ?? '' }}">
                                <div class="help-block with-errors"></div>
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