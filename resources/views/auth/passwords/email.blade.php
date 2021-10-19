@extends('layouts.base')

@section('content')
<!-- Start of Main -->
<main class="main login-page    ">
    <x-page-header title="Quên mật khẩu" />
    <div class="page-content">
        <div class="container">
            <div class="login-popup">
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li class="nav-item">
                            <p class="nav-link active">Quên mật khẩu</p>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="sign-in">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf                            
                                <div class="form-group">
                                    <label>Email của bạn</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
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
