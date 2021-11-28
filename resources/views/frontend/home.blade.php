@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="header-bottom sticky-content fix-top sticky-header">
    <div class="container">
        <div class="inner-wrap">
            <div class="header-left flex-1">
                <div class="dropdown category-dropdown has-border" data-visible="true">
                    <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true" data-display="static"
                        title="Browse Categories">
                        <i class="w-icon-category"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>

                    <div class="dropdown-box">
                        <ul class="menu vertical-menu category-menu">
                            @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('products.category', ['category' => $category->slug]) }}">
                                    <i class="w-icon-tshirt2"></i>{{ $category->name }}
                                </a>
                            </li>                                
                            @endforeach
                        </ul>
                    </div>
                </div>
                <form method="get" action="{{ route('products.search') }}" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    <div class="select-box">
                        <select id="category" name="category">
                            <option value="">Tất cả</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>                    
                            @endforeach
                        </select>
                    </div>
                    <input type="text" class="form-control" name="keyword"
                        placeholder="Tìm kiếm..." required />
                    <button class="btn btn-search" type="submit"><i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<main class="main">
    <div class="intro-section">
        <div class="swiper-container swiper-theme nav-inner pg-inner animation-slider pg-xxl-hide pg-show nav-xxl-show nav-hide"
            data-swiper-options="{
            'slidesPerView': 1,
            'autoplay': {
                'delay': 4000,
                'disableOnInteraction': false
            }
        }">
            <div class="swiper-wrapper row gutter-no cols-1">
                <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                    style="background-image: url(assets/images/demos/demo2/slides/slide-1.jpg); background-color: #f1f0f0;">
                    <!-- End of .container -->
                </div>
                <!-- End of .intro-slide1 -->
            </div>
            <div class="swiper-pagination"></div>
            <button class="swiper-button-next"></button>
            <button class="swiper-button-prev"></button>
        </div>
    </div>
    <!-- End of .intro-section -->

    <div class="container">
        <div class="swiper-container swiper-theme icon-box-wrapper appear-animate br-sm mt-6 mb-10"
            data-swiper-options="{
            'loop': true,
            'slidesPerView': 1,
            'autoplay': {
                'delay': 4000,
                'disableOnInteraction': false
            },
            'breakpoints': {
                '576': {
                    'slidesPerView': 2
                },
                '768': {
                    'slidesPerView': 3
                },
                '1200': {
                    'slidesPerView': 4
                }
            }
        }">
            <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                <div class="swiper-slide icon-box icon-box-side text-dark">
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Giao hàng nhanh chóng</h4>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side text-dark">
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Bảo mật thanh toán</h4>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side text-dark icon-box-money">
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Đảm bảo hoàn tiền</h4>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side text-dark icon-box-chat">
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Hỗ trợ khách hàng 24/24</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Iocn Box Wrapper -->


        <div class="swiper-container swiper-theme product-deals-wrapper appear-animate mb-7"
            data-swiper-options="{
            'spaceBetween': 20,
            'slidesPerView': 2,
            'breakpoints': {
                '576': {
                    'slidesPerView': 3
                },
                '768': {
                    'slidesPerView': 4
                },
                '992': {
                    'slidesPerView': 5
                }
            }
        }">
            <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-2">
                @foreach ($products as $product)
                <div class="swiper-slide product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="{{ route('products.detail', ['product' => $product->slug]) }}">
                                <img src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->name }}" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="{{ route('products.detail', ['product' => $product->slug]) }}">{{ $product->name }}</a></h4>
                        </div>
                    </div>
                </div>                    
                @endforeach
            </div>
            <div class="swiper-pagination">
                {{ $products->links() }}
            </div>
        </div>
        <!-- End of Product Deals Warpper -->


        <h2 class="title text-left mb-5 pt-1 appear-animate">Bài viết mới nhất</h2>
        <div class="swiper-container swiper-theme post-wrapper mb-10 mb-lg-5 appear-animate"
            data-swiper-options="{
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
                    'slidesPerView': 4
                }
            }
        }">
            <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1">
                @foreach ($posts as $post)
                <div class="swiper-slide post">
                    <figure class="post-media br-sm">
                        <a href="{{ route('posts.detail', ['post' => $post->slug]) }}">
                            <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="{{ $post->title }}" width="620" height="398"
                                style="background-color: #898078;">
                        </a>
                        <div class="post-calendar">
                            <span class="post-day">{{ $post->created_at->format('d') }}</span>
                            <span class="post-month">{{ $post->created_at->format('M') }}</span>
                        </div>
                    </figure>
                    <div class="post-details">
                        <h4 class="post-title"><a href="{{ route('posts.detail', ['post' => $post->slug]) }}">{{ $post->title }}</a></h4>
                        <div class="post-content">
                            <p>{{ $post->short_description }}</p>
                        </div>
                        <a href="{{ route('posts.detail', ['post' => $post->slug]) }}" class="btn btn-link btn-dark btn-underline">Chi tiết<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>                    
                @endforeach
            </div>
            <div class="swiper-pagination">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    <!-- End of Container -->
</main>
@endsection