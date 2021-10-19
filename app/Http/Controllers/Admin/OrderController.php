<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use HoangPhi\VietnamMap\Models\District;
use HoangPhi\VietnamMap\Models\Province;
use HoangPhi\VietnamMap\Models\Ward;
use Illuminate\Http\Request;

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
        return view('admin.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $province = Province::all();
        $products = Product::select('id', 'name_vi')->with('media')->limit(12)->get();
        return view('admin.orders.create', compact('products', 'province'));
    }

    public function search () {
        $output = '';
        $products = Product::where('name_vi','LIKE','%'. request()->search.'%')->limit(12)->get();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
