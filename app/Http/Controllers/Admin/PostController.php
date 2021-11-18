<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $posts = Post::withoutGlobalScope('status')->with('postCategory','media')->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $postCategories = PostCategory::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('name', 'id');
        
        return view('admin.posts.create', compact('postCategories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        $post->tags()->sync($request->input('tags', []));
        $post->handleUploadFile($request->file('image'));

        Toastr::success('Thêm bài viết thành công !', 'Thông báo');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $postCategories = PostCategory::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('name', 'id');
        
        return view('admin.posts.edit', compact('post', 'postCategories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        $post->tags()->sync($request->input('tags', []));
        $post->handleUpdateFile($request->file('image'));        

        Toastr::success('Cập nhật bài viết thành công !', 'Thông báo');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $post->delete();

        Toastr::success('Xóa bài viết thành công !', 'Thông báo');
        return back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \App\Http\Requests\MassDestroyPostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyPostRequest $request) {
        Post::whereIn('id', request('ids'))->delete();

        Toastr::success('Xóa bài viết đã chọn thành công !', 'Thông báo');
    }

    /**
     * Display a listing of the resource in the trash.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash() {
        $posts = Post::onlyTrashed()->with('postCategory', 'media')->get();
        
        return view('admin.posts.trash', compact('posts'));
    }

    /**
     * Restore the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function restore($id) {
        Post::withTrashed()->find($id)->restore();

        Toastr::success('Khôi phục bài viết thành công !', 'Thông báo');
        return redirect()->route('posts.index');
    }

    /**
     * Force delete the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id) {
        Post::withTrashed()->find($id)->forceDelete();

        Toastr::success('Xóa bài viết khỏi thùng rác thành công !', 'Thông báo');
        return back();
    }

    /**
     * Hide the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function hideStatus(Post $post) {
        $post->update(['status' => Post::IS_ACTIVE]);

        return back();
    }

    /**
     * Show the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function showStatus($id) {
        Post::withoutGlobalScope('status')->find($id)
            ->update(['status' => Post::ACTIVE]);

        return back();
    }
}
