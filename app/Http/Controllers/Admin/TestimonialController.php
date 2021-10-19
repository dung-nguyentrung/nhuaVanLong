<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTestimonialRequest;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('testimonial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $testimonials = Testimonial::with('media')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('testimonial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
        $testimonial = Testimonial::create($request->validated());
        $testimonial->handleUploadFile($request->file('image'));

        Toastr::success('Thêm đánh giá khách hàng thành công !', 'Thông báo');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestimonialRequest  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $testimonial->update($request->validated());
        $testimonial->handleUpdateFile($request->file('image'));

        Toastr::success('Cập nhật đánh giá khách hàng thành công !');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $testimonial->delete();

        Toastr::success('Xóa đánh giá khách hàng thành công !');
        return back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @param  \App\Http\Requests\MassDestroyTestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyTestimonialRequest $request) {
        Testimonial::destroy(request('ids'));

        Toastr::success('Xóa đánh giá khách hàng đã chọn thành công !');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
