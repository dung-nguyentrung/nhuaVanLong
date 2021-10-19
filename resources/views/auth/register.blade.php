@extends('layouts.base')

@section('content')
<!-- Start of Main -->
<main class="main login-page">
    <x-page-header title="Đăng ký tài khoản" />
    <div class="page-content">
        <div class="container">
            <div class="login-popup">
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li class="nav-item">
                            <p class="nav-link active">Đăng ký</p>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="sign-in">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>                            
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
                                <div class="form-group mb-0">
                                    <label>Xác nhận mật khẩu *</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                            </form>
                        </div>
                    </div>
                    <p class="text-center">Đăng nhập với</p>
                    <div class="social-icons social-icon-border-color d-flex justify-content-center">
                        <a href="login.html#" class="social-icon social-facebook"><i class="fab fa-facebook-square"></i></a>
                        <a href="login.html#" class="social-icon social-twitter"><i class="fab fa-twitter"></i></a>
                        <a href="login.html#" class="social-icon social-google fab fa-google"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End of Main -->
@endsection