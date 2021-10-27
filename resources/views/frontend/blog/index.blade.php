@extends('layouts.base')
@section('content')
<!-- Start of Main -->
<main class="main">
    <x-page-header title="Tin tức && sự kiện"/>

    <!-- Start of Page Content -->
    <div class="page-content mb-10 pb-2">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    @foreach ($posts as $post)
                    <article class="post post-list post-listing mb-md-10 mb-6 pb-2 overlay-zoom mb-4">
                        <figure class="post-media br-sm">
                            <a href="post-single.html">
                                <img src="{{ $post->getFirstMediaUrl('posts', 'thumb') }}" width="930"
                                    height="500" alt="{{ $post->name }}">
                            </a>
                        </figure>
                        <div class="post-details">
                            <div class="post-cats text-primary">
                                <a href="{{ route('posts.category',['postCategory' => $post->postCategory->name ]) }}">{{ $post->postCategory->name }}</a>
                            </div>
                            <h4 class="post-title">
                                <a href="{{ route('posts.detail', ['post' => $post->slug]) }}">{{ $post->name }}</a>
                            </h4>
                            <div class="post-content">
                                <p>{{ $post->short_description }}</p>
                                <a href="{{ route('posts.detail', ['post' => $post->slug]) }}" class="btn btn-link btn-primary">(xem thêm)</a>
                            </div>
                            <div class="post-meta">
                                bởi <span class="post-author">{{ $post->creator->name }}</span>
                                - <span class="post-date">{{ $post->created_at->format('d.m.Y') }}</span>
                            </div>
                        </div>
                    </article>                        
                    @endforeach
                    {{ $posts->links() }}
                </div>
                <!-- End of Main Content -->
                <x-blog-sliderbar />
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->
@endsection