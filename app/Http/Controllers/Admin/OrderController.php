<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use HoangPhi\VietnamMap\Models\District;
use HoangPhi\VietnamMap\Models\Province;
use HoangPhi\VietnamMap\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\returnSelf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['province', 'ward', 'district', 'creator', 'receipt'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function search () {
        $output = '';
        $products = Product::where('name','LIKE','%'. request()->search.'%')->limit(12)->get();
        if ($products) {
            foreach ($products as $item) {
                $output .= '<div class="col-md-3">
                                <a class="addItem" href="#" data-value="'.$item->id.'">
                                    <img src="'.$item->getFirstMediaUrl('products').'" width="150" alt="'.$item->name_vi.'">
                                    <p class="text-center">'.$item->name_vi.'</p>
                                </a>
                            </div>';
            }
        }
        return response()->json($output);
    }

    public function province () {
        $output = '';
        $outputWard = '';
        $districts = District::where('province_id', request()->id)->get();
        if ($districts) {
            foreach ($districts as $item) {
                $output .= '<option value="'.$item->id.'">'.$item->name.'</option>';
            }
        }
        $id = $districts->first()->id;
        $wards = Ward::where('district_id', $id)->get();
        if ($wards) {
            foreach ($wards as $item) {
                $outputWard .= '<option value="'.$item->id.'">'.$item->name.'</option>';
            }
        }

        return response()->json([
            'output' => $output,
            'outputWard' => $outputWard,
        ]);
    }

    public function district () {
        $output = '';
        $wards = Ward::where('district_id', request()->id)->get();
        if ($wards) {
            foreach ($wards as $item) {
                $output .= '<option value="'.$item->id.'">'.$item->name.'</option>';
            }
        }
        return response()->json($output);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $items = OrderItem::where('order_id', $order->id)->with(['order', 'product'])->get();
        return view('admin.orders.show', compact('order', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $items = OrderItem::where('order_id', $order->id)->with(['order', 'product'])->get();
        $province = Province::where('id', '!=', $order->province->id)->get();
        return view('admin.orders.edit', compact('order', 'items', 'province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        Toastr::success('Cập nhật thông tin đơn hàng thành công !', 'Thông báo');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $order->delete();
        return back();
    }

    public function confirm(Order $order) {
        $order->update(['status' => Order::CONFIRMED]);

        $items = OrderItem::where('order_id', $order->id)->get();
        foreach ($items as $item) {
            $product = Product::where('id', $item->product_id)->first();
            if ($product->quantity >= $item->quantity) {
                $product->quantity = $product->quantity - $item->quantity;
                $product->save();
            }
            else{
                Toastr::error('Xin lỗi ! Số lượng sản phẩm trong kho không đủ', 'Lỗi');
                return back();
            }
        }

        Toastr::success('Xác nhận đơn hàng thành công !', 'Thông báo');
        return back();
    }

    public function updateItem(Request $request, OrderItem $orderItem) {
        $orderItem->update(['quantity' => $request->quantity]);
        Toastr::success('Cập nhật số lượng đơn hàng thành công !','Thông báo');
        return back();
    }

    public function debt(Request $request, Receipt $receipt) {
        if ($receipt->total >= $receipt->paid + $request->paid)
        {
            $receipt->in_debt = $receipt->in_debt - ($receipt->paid + $request->paid);
        }
        else
        {
            $receipt->in_debt = 0;
            $receipt->refund = ($receipt->paid + $request->paid) - $receipt->total;
        }
        $receipt->paid = $receipt->paid + $request->paid;
        $receipt->save();
        Toastr::success('Cập nhật công nợ thành công !', 'Thông báo');
        return back();
    }

    public function contract(Order $order) {
        $setting = Setting::first();
        return view('admin.orders.contract', compact('order', 'setting'));
    }

    public function sorting(Request $request)
    {
        if (is_null($request->value)) {
            $orders = Order::with(['province', 'ward', 'district', 'creator', 'receipt'])->get();
        }else{
            $orders = Order::with(['province', 'ward', 'district', 'creator', 'receipt'])
            ->where('status', $request->value)->get();
        }
        return response()->json(['view' => view('admin.orders.list-order', compact('orders'))->render()]);
    }
}
