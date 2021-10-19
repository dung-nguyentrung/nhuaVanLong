<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('media', 'category')->paginate(12);

        return view('frontend.shop.index', compact('products'));
    }

    public function detail(Product $product) {
        $related_products = Product::getProductByCategory($product->category_id)->get();
        $random_products = Product::getRandomProduct()->get();
        return view('frontend.shop.detail', compact('product', 'related_products', 'random_products'));
    }

    public function search (SearchRequest $request) {
        $products = Product::searchProduct($request->keyword, $request->category)->paginate(8);

        return view('frontend.shop.index', compact('products'));
    }

    public function category(Category $category) {
        $products = Product::sortByCategory($category->id)->paginate(6);

        return view('frontend.shop.index', compact('products'));
    }    
}
