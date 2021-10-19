@php
    $name = 'name_'.config('app.locale')
@endphp
<aside class="sidebar right-sidebar blog-sidebar sidebar-fixed sticky-sidebar-wrapper">                    
    <div class="sidebar-content">
        <div class="sticky-sidebar">
            <div class="widget widget-search-form">
                <div class="widget-body">
                    <form action="{{ route('posts.search') }}" method="GET" class="input-wrapper input-wrapper-inline">
                        <input type="text" class="form-control"
                            placeholder="Tìm kiếm" name="keyword" required>
                        <button class="btn btn-search"><i
                                class="w-icon-search"></i></button>
                    </form>
                </div>
            </div>
            <!-- End of Widget search form -->
            <div class="widget widget-categories">
                <h3 class="widget-title bb-no mb-0">Danh mục bài viết</h3>
                <ul class="widget-body filter-items search-ul">
                    <li><a href="/blogs">Tất cả</a></li>
                    @foreach ($postCategories as $postCategory)
                    <li><a href="{{ route('posts.category', ['postCategory' => $postCategory->slug ]) }}">{{ $postCategory->$name }}</a></li>                                        
                    @endforeach
                </ul>
            </div>
            <!-- End of Widget categories -->
            <div class="widget widget-posts">
                <h3 class="widget-title bb-no">Bài viết phổ biến</h3>
                <div class="widget-body">
                    <div class="swiper">
                        <div class="swiper-container swiper-theme nav-top" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 1
                        }">
                            <div class="swiper-wrapper row cols-1">
                                <div class="swiper-slide widget-col">
                                    @foreach ($popular_posts as $post)
                                    <div class="post-widget mb-4">
                                        <figure class="post-media br-sm">
                                            <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="150" height="150" />
                                        </figure>
                                        <div class="post-details">
                                            <div class="post-meta">
                                                <span class="post-date">{{ $post->created_at->format('M, d Y') }}</span>
                                            </div>
                                            <h4 class="post-title">
                                                <a href="{{ route('posts.detail', ['post' => $post->slug]) }}">{{ $post->$name }}</a>
                                            </h4>
                                        </div>
                                    </div>                                        
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget widget-tags">
                <h3 class="widget-title bb-no">Chủ đề</h3>
                <div class="widget-body tags">
                    @foreach ($tags as $tag)
                    <a href="{{ route('posts.tag', ['tag' => $tag->slug ]) }}" class="tag">{{ $tag->$name }}</a>                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</aside>