<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function index() {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 
        $revenue = Order::sum('total');
        $sale = Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('total');
        $product_sold = OrderItem::sum('quantity');
        $feature_products = Product::orderBy('view', 'DESC')->limit(4)->get();

        $most_sold_products = OrderItem
            ::join('products', 'products.id', '=', 'order_items.product_id')
            ->selectRaw('products.*, max(order_items.quantity) as max')
            ->groupBy('products.id')
            ->orderBy('quantity', 'desc')
            ->take(2)
            ->get();

        $data = $this->getRevenueYear();

        return view('admin.dashboard', compact('revenue', 'data','product_sold', 'sale', 'feature_products', 'most_sold_products'));
    }

    public function getRevenueYear() {
        $orders = Order::select(DB::raw('SUM(total) as sum'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('sum');

        $months = Order::select(DB::raw('Month(created_at) as month'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('month');
        $data = [0,0,0,0,0,0,0,0,0,0,0,0];

        foreach ($months as $index => $month) {
            --$month;
            $data[$month] = $orders[$index];
        }

        return $data;
    }
}
