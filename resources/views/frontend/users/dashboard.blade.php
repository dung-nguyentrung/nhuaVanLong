@extends('layouts.base')

@section('content')
<!-- Start of Main -->
<main class="main">
    <x-page-header title="Tài khoản của bạn" />

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <span>Xin chào</span> <h2>{{ Auth::user()->name }}</h2>
            <div class="tab ">
                <x-user-nav-bar />

                <div class="tab-content mb-6">
                    <div class="tab-pane active in" id="account-dashboard">

                        <div class="row">
                            <form action="{{ Route('user.update', ['user' => Auth::user()->id]) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone_number" value="{{ Auth::user()->phone_number }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                </div>
                                <button class="btn btn-primary mt-5">Xác nhận</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->
@endsection