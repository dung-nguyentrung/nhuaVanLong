<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\{PasswordRequest, UserRequest};
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        return view('frontend.users.dashboard');
    }

    public function update(UserRequest $request, User $user) {
        $user->update($request->validated());
        Toastr::success('Cập nhật thông tin tài khoản thành công !', 'Thông báo');
        return back();
    }

    public function password() {
        return view('frontend.users.password');
    }

    public function changePassword(PasswordRequest $request) {
        if ($request->validated()) {
            User::find(Auth::user()->id)->update(['password' => Hash::make($request->password)]);
            Toastr::success('Đổi mật khẩu thành công !', 'Thông báo');
        }
        return back();
    }

    public function order() {
        $orders = Order::where('created_by', Auth::user()->id)->with('creator', 'province', 'district', 'ward')->get();
        return view('frontend.users.order', compact('orders'));
    }

    public function contract(Order $order) {
        $order = Order::first();
        $items = OrderItem::where('order_id', $order->id)->with('product', 'order')->get();
        return view('frontend.shop.contract', compact('order', 'items'));
    }
}
