<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.setting', ['setting' => Setting::first() ?? '']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        Setting::first() 
            ? Setting::first()->update($request->validated()) 
            : Setting::create($request->all());

        Toastr::success('Cập nhật thông tin website thành công !', 'Thông báo');
        return back();
    }
}
