<?php

namespace App\View\Components;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Tag;
use Illuminate\View\Component;

class BlogSliderbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $popular_posts = Post::getRandomPost()->get();
        $postCategories = PostCategory::all();
        $tags = Tag::all();

        return view('components.blog-sliderbar', compact('popular_posts', 'postCategories', 'tags'));
    }
}
