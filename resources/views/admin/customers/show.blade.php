@extends('admin.layouts.app')

@section('title', $customer->name)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">{{ $customer->name }}</h4>
                </div>
                <div>
                    @can('customer_access')
                    <a href="{{ route('customers.index') }}" class="btn btn-primary add-list"></i>Quay lại</a>                        
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
            <table class="table table-bordered mb-0 tbl-server-info" border="1px">
                <tbody class="ligth-body">
                    <tr>
                        <th>Mã</th>
                        <th>{{ $customer->id }}</th>
                    </tr>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>{{ $customer->name }}</th>
                    </tr>
                    <tr>
                        <th>Điện thoại</th>
                        <th>{{ $customer->phone }}</th>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>{{ $customer->email }}</th>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <th>{{ $customer->address }}</th>
                    </tr>
                    <tr>
                        <th>Công ty</th>
                        <th>{{ $customer->company_name }}</th>
                    </tr>
                    <tr>
                        <th>Địa chỉ công ty</th>
                        <th>{{ $customer->company_address }}</th>
                    </tr>
                    <tr>
                        <th>Tài khoản công ty</th>
                        <th>{{ $customer->bank_account }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection