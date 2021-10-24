<ul class="nav nav-tabs mb-6">
    <li class="nav-item">
        <a href="{{ route('user.dashboard') }}" class="text-dark">Thông tin tài khoản</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('user.password') }}"  class="text-dark">Đổi mật khẩu</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('user.order') }}" class="text-dark">Đơn hàng của bạn</a>
    </li>
    <li class="link-item">
        <a href="{{ route('logout') }}" class="text-dark"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
        <form action="{{ route('logout') }}" method="post" id="logout-form">
            @csrf
        </form>
    </li>
</ul>