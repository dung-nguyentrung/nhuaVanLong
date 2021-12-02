@extends('layouts.base')
@section('title', $post->name)
@push('styles')
<meta property="og:site_name" content="{{ $post->name }}" />
<meta property="article:author" content="Công ty TNHH nhựa Vân Long" />
<meta property="article:section" content="Bán hàng, sản phẩm nhựa" />
<meta property="og:image:type" content="image/png" />
<meta name="robots" content="noindex,nofollow">
<meta property="og:url" content="http://honghaecocity.online/" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->name }}" />
<meta property="og:description" content="{{ $post->short_description }}" />
<meta property="og:image" content="{{ $post->getFirstMediaUrl('posts') }}" />
@endpush
@section('content')
<!-- Start of Main -->
<main class="main">
    <x-page-header title="{{ $post->name }}"></x-page-header>

    <!-- Start of Page Content -->
    <div class="page-content mb-8">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content post-single-content">
                    <div class="post post-grid post-single">
                        <figure class="post-media br-sm">
                            <img src="{{ $post->getFirstMediaUrl('posts','thumb') }}" alt="{{ $post->name }}" width="930" height="500" />
                        </figure>
                        <div class="post-details">
                            <div class="post-meta">
                                bởi <span class="post-author">{{ $post->creator->name }}</span>
                                - <span class="post-date">{{ $post->created_at->format('d.m.Y') }}</span>
                                {{-- <span class="post-comment"><i class="w-icon-comments"></i><span>0</span>Comments</span> --}}
                            </div>
                            <h2 class="post-title">{{ $post->name }}</h2>
                            <div class="post-content">
                                {!! $post->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="tags">
                        <label class="text-dark mr-2">Chủ đề:</label>
                        @foreach ($post->tags as $tag)
                        <a href="{{ route('posts.tag', ['tag' => $tag->slug]) }}" class="tag">{{ $tag->name }}</a>                            
                        @endforeach
                    </div>
                    <!-- End Tag -->
                    <div class="social-links mb-10">
                        <div class="social-icons social-no-color border-thin">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" class="social-icon social-facebook"><i
                                    class="fab fa-facebook-square"></i></a>
                            <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" class="social-icon social-twitter"><i
                                    class="fab fa-twitter-square"></i></a>
                            <a href="https://plus.google.com/share?url{{ Request::url() }}"
                                class="social-icon social-youtube fab fa-google-plus"></a>
                        </div>
                    </div>
                    <!-- End Post Navigation -->
                    <h4 class="title title-lg font-weight-bold mt-10 pt-1 mb-5">Bài viết liên quan</h4>
                    <div class="swiper">
                        <div class="post-slider swiper-container swiper-theme nav-top pb-2" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 1,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '992': {
                                    'slidesPerView': 2
                                },
                                '1200': {
                                    'slidesPerView': 3
                                }
                            }
                        }">
                            <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-xs-2 cols-1">
                                @foreach ($random_posts as $post)
                                <div class="swiper-slide post post-grid">
                                    <figure class="post-media br-sm">
                                        <a href="{{ route('posts.detail', ['post' => $post->slug]) }}">
                                            <img src="{{ $post->getFirstMediaUrl('posts', 'thumb') }}" alt="{{ $post->name }}" width="296"
                                                height="190" style="background-color: #bcbcb4;" />
                                        </a>
                                    </figure>
                                    <div class="post-details text-center">
                                        <div class="post-meta">
                                            bởi <a class="post-author">{{ $post->creator->name }}</a>
                                            - <a class="post-date">{{ $post->created_at->format('d.m.Y') }}</a>
                                        </div>
                                        <h4 class="post-title mb-3"><a href="{{ route('posts.detail', ['post' => $post->slug]) }}">{{ $post->name }}</a></h4>
                                    </div>
                                </div>                                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->
                <x-blog-sliderbar></x-blog-sliderbar>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->
@endsection