@extends('layouts.base')

@section('content')
<!-- Start of Main -->
<main class="main">
    <x-page-header title="Tài khoản của bạn" />

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <span>Xin chào</span> <h2>{{ Auth::user()->name }}</h2>
            <div class="tab">
            <x-user-nav-bar/>

                <div class="tab-content mb-6">
                    <div class="tab-pane active in" id="account-dashboard">
                        <div class="row">
                            <form action="{{ route('user.password') }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label>Mật khẩu hiện tại</label>
                                    <input type="password" class="form-control" name="old_password">
                                    @error('old_password')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" class="form-control" name="password">
                                    @error('password')
                                        <div  style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" name="password_confirmation">
                                    @error('password_confirmation')
                                        <div  style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary mt-5">Đổi mật khẩu</button>
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