@extends('layouts.base')
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
                            <a href="" class="social-icon social-facebook">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            <a href="" class="social-icon social-twitter">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                            <a href="" class="social-icon social-pinterest">
                                <i class="fab fa-pinterest"></i>
                            </a>
                            <a href="" class="social-icon social-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="" class="social-icon social-youtube">
                                <i class="fab fa-youtube-square"></i>
                            </a>
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
                    <!-- End Related Posts -->
                    
                    {{-- <h4 class="title title-lg font-weight-bold pt-1 mt-10">3 Comments</h4>
                    <ul class="comments list-style-none pl-0">
                        <li class="comment">
                            <div class="comment-body">
                                <figure class="comment-avatar">
                                    <img src="assets/images/blog/single/1.png" alt="Avatar" width="90" height="90" />
                                </figure>
                                <div class="comment-content">
                                    <h4 class="comment-author font-weight-bold">
                                        <a href="post-single.html#">John Doe</a>
                                        <span class="comment-date">Aug 23, 2021 at 10:46 am</span>
                                    </h4>
                                    <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl.arcu fer
                                        ment umet, dapibus sed, urna.</p>
                                    <a href="post-single.html#" class="btn btn-dark btn-link btn-underline btn-icon-right btn-reply">Reply<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="comment">
                            <div class="comment-body">
                                <figure class="comment-avatar">
                                    <img src="assets/images/blog/single/2.png" alt="Avatar" width="90" height="90" />
                                </figure>
                                <div class="comment-content">
                                    <h4 class="comment-author font-weight-bold">
                                        <a href="post-single.html#">Semi Colon</a>
                                        <span class="comment-date">Aug 24, 2021 at 13:25 am</span>
                                    </h4>
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales.</p>
                                    <a href="post-single.html#" class="btn btn-dark btn-link btn-underline btn-icon-right btn-reply">Reply<i class="w-icon-long-arrow-right"></i></a>
                                </div>  
                            </div>
                        </li>
                        <li class="comment">
                            <div class="comment-body">
                                <figure class="comment-avatar">
                                    <img src="assets/images/blog/single/1.png" alt="Avatar" width="90" height="90" />
                                </figure>
                                <div class="comment-content">
                                    <h4 class="comment-author font-weight-bold">
                                        <a href="post-single.html#">John Doe</a>
                                        <span class="comment-date">Aug 23, 2021 at 10:46 am</span>
                                    </h4>
                                    <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl.arcu fer
                                        ment umet, dapibus sed, urna.</p>
                                    <a href="post-single.html#" class="btn btn-dark btn-link btn-underline btn-icon-right btn-reply">Reply<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- End Comments -->
                    <form class="reply-section pb-4">
                        <h4 class="title title-md font-weight-bold pt-1 mt-10 mb-0">Leave a Reply</h4>
                        <p>Your email address will not be published. Required fields are marked</p>
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <input type="text" class="form-control" placeholder="Enter Your Name" id="name">
                            </div>
                            <div class="col-sm-6 mb-4">
                                <input type="text" class="form-control" placeholder="Enter Your Email" id="email_1">
                            </div>
                        </div>
                        <textarea cols="30" rows="6" placeholder="Write a Comment" class="form-control mb-4" id="comment"></textarea>
                        <button class="btn btn-dark btn-rounded btn-icon-right btn-comment">Post Comment<i class="w-icon-long-arrow-right"></i></button>
                    </form> --}}
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