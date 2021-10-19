<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use HoangPhi\VietnamMap\Models\District;
use HoangPhi\VietnamMap\Models\Province;
use HoangPhi\VietnamMap\Models\Ward;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart() {
        $random_products = Product::getRandomProduct()->get();
        return view('frontend.shop.cart', compact('random_products'));
    }

    public function checkout() {      
        $provinces = Province::all();
        return view('frontend.shop.checkout', compact('provinces'));
    }

    public function addToCart(Request $request) {
        Cart::instance('cart')->add($request->id, $request->name, 1, $request->price)->associate(Product::class);

        Toastr::success('Thêm sản phẩm vào giỏ hàng thành công !', 'Thông báo');
        return redirect()->route('cart');
    }

    public function wishlist() {
        $random_products = Product::getRandomProduct()->get();
        return view('frontend.shop.wishlist', compact('random_products'));
    }

    public function addToWishlist(Request $request) {
        if (!empty($request->id)) {
            $product = Product::findOrFail($request->id);
            Cart::instance('wishlist')->add($product->id, $product->name_vi, 1, $product->price)->associate(Product::class);
        }    
        return response()->json();
    }

    public function addToCartAjax(Request $request) {
        if (!empty($request->id)) {
            $product = Product::findOrFail($request->id);
            Cart::instance('cart')->add($product->id, $product->name_vi, 1, $product->price)->associate(Product::class);
        }

        return response()->json();
    }

    public function removeCart(Request $request) {
        if (!empty($request->rowId))
            Cart::remove($request->rowId);

        return response()->json();
    }

    public function destroyCart() {
        Cart::instance('cart')->destroy();
        Toastr::success('Xóa giỏ hàng thành công !', 'Thông báo');
        return redirect()->route('shop');
    }

    public function updateCart(Request $request) {
        if ($request->quantity > 0) {
            Cart::instance('cart')->update($request->rowId, $request->quantity);
            Toastr::success('Cập nhật giỏ hàng thành công !', 'Thông báo');
        }
        else
            Toastr::erorr('Số lượng sản phẩm không hợp lệ !', 'Thông báo');

        return back();
    }
}
