<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index () {
        $posts = Post::with('postCategory', 'media', 'creator')->latest('id')->paginate(6);        

        return view('frontend.blog.index', compact('posts'));
    }

    public function detail (Post $post) {
        $post->increment('view');
        $random_posts = Post::getRandomPost()->get();
        return view('frontend.blog.detail', compact('post','random_posts'));
    }

    public function search(SearchRequest $request) {
        $posts = Post::searchByName($request->keyword)->paginate(6);
        
        return view('frontend.blog.index', compact('posts'));
    }

    public function category(PostCategory $postCategory) {        
        $posts = Post::sortByCategory($postCategory->id)->paginate(6);

        return view('frontend.blog.index', compact('posts'));
    }

    public function tag(Tag $tag) {
        $posts = $tag->posts()->paginate(6);

        return view('frontend.blog.index', compact('posts'));
    }
}
