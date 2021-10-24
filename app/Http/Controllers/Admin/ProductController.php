<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::with('category', 'media')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::all()->pluck('name', 'id');

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        $product->handleUploadFile($request->file('image'), $request->file('drawing'));        

        Toastr::success('Thêm sản phẩm thành công !', 'Thông báo');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::all()->pluck('name', 'id');
        
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        $product->handleUpdateFile($request->file('image'), $request->file('drawing'));        

        Toastr::success('Cập nhật sản phẩm thành công !', 'Thông báo');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $product->delete();

        Toastr::success('Xóa sản phẩm thành công !', 'Thông báo');
        return back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \App\Http\Requests\MassDestroyProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyProductRequest $request) {
        Product::whereIn('id', request('ids'))->delete();

        Toastr::success('Xóa sản phẩm đã chọn thành công !', 'Thông báo');
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function trash() {
        $products = Product::onlyTrashed()->with('category', 'media')->get();

        return view('admin.products.trash', compact('products'));
    }

    public function restore($id) {
        abort_if(Gate::denies('product_restore'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Product::withTrashed()->find($id)->restore();

        Toastr::success('Khôi phục sản phẩm thành công !', 'Thông báo');
        return redirect()->route('products.index');
    }

    public function forceDelete($id) {
        Product::withTrashed()->find($id)->forceDelete();

        Toastr::success('Xóa sản phẩm khỏi thùng rác thành công !', 'Thông báo');
        return back();
    }
}
