<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPostCategoryRequest;
use App\Http\Requests\StorePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Models\PostCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('post_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $postCategories = PostCategory::all();

        return view('admin.post_categories.index', compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('post_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.post_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostCategoryRequest $request)
    {
        PostCategory::create($request->validated());

        Toastr::success('Thêm danh mục bài viết thành công !', 'Thông báo');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postCategory)
    {
        abort_if(Gate::denies('post_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.post_categories.show', compact('postCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postCategory)
    {
        abort_if(Gate::denies('post_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.post_categories.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostCategoryRequest  $request
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCategoryRequest $request, PostCategory $postCategory)
    {
        $postCategory->update($request->validated());

        Toastr::success('Cập nhật danh mục bài viết thành công !', 'Thông báo');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        abort_if(Gate::denies('post_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $postCategory->delete();

        Toastr::success('Xóa danh mục bài viết thành công!', 'Thông báo');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\MassDestroyPostCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyPostCategoryRequest $request) {
        PostCategory::whereIn('id', request('ids'))->delete();

        Toastr::success('Xóa danh mục bài viết đã chọn thành công!', 'Thông báo');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
