<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Receipt;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderService 
{
    public function storeNewOrder(
        array $data,
        array $products
    ): Order
    {
        $order = Order::create($data);

        foreach ($products as $product) {
            $item = new OrderItem();
            $item->order_id = $order->id;
            $item->product_id = $product;
            $item->quantity = request()->quantity[$product];
            $item->price = request()->price[$product];
            $item->save();
        }

        $receipt = new Receipt();
        $receipt->order_id = $order->id;
        $receipt->total = request()->total;
        $receipt->paid = 0;
        $receipt->in_debt = 0;
        $receipt->save();

        Cart::instance('cart')->destroy();

        return $order;
    }
}