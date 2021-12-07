@extends('layouts.base')
@section('title', 'Đăng nhập')
@section('content')
<!-- Start of Main -->
<main class="main login-page">
    <x-page-header title="Đăng nhập" />
    <div class="page-content">
        <div class="container">
            <div class="login-popup">
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li class="nav-item">
                            <p class="nav-link active">Đăng nhập</p>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="sign-in">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf                            
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email" type="email"
                                    class="floating-input form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <label>Mật khẩu *</label>
                                    <input id="password" type="password"
                                    class="floating-input form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-checkbox d-flex align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox"
                                    name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" style="margin-right: 19.5rem !important">Nhớ mật khẩu</label>
                                    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                                </div>
                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End of Main -->
@endsection