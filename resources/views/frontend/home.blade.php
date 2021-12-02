@extends('layouts.app')
@section('title', 'Nhựa Vân Long')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="header-bottom sticky-content fix-top sticky-header">
    <div class="container">
        <div class="inner-wrap">
            <div class="header-left flex-1">
                <div class="dropdown category-dropdown has-border" data-visible="true">
                    <a href="#" class="category-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true" data-display="static" title="Browse Categories">
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
                <form method="get" action="{{ route('products.search') }}"
                    class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    <div class="select-box">
                        <select id="category" name="category">
                            <option value="">Tất cả</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm..." required />
                    <button class="btn btn-search" type="submit"><i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<main class="main">
    <div class="intro-section container">
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
        <div class="swiper-container swiper-theme icon-box-wrapper appear-animate br-sm mt-6 mb-10" data-swiper-options="{
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
                        <div class="text-center">
                            <svg width="30px" height="30px" viewBox="0 -64 640 640" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z" />
                            </svg>
                        </div>
                        <h4 class="icon-box-title">
                            Giao hàng nhanh chóng</h4>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side text-dark">
                    <div class="icon-box-content">
                        <div class="text-center">
                            <svg version="1.1" width="30px" height="30px" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink"
                                enable-background="new 0 0 512 512">
                                <path
                                    d="M454.915,1.566c-5.563-2.648-12.14-1.898-16.945,1.961c-47.407,38.141-124.532,38.141-171.939,0  c-5.859-4.703-14.203-4.703-20.063,0c-47.407,38.141-124.532,38.141-171.939,0c-4.805-3.859-11.39-4.609-16.945-1.961  C51.53,4.223,48,9.84,48,15.996v288.002c0,92.782,76.086,170.298,203.532,207.369c1.461,0.422,2.961,0.633,4.468,0.633  c1.508,0,3.007-0.211,4.468-0.633C387.914,474.297,464,396.78,464,303.998V15.996C464,9.84,460.469,4.223,454.915,1.566z M80,45.207  c34,17.092,73.953,22.318,111.711,15.787L80,182.861V45.207z M240,474.063c-101-34.61-160-97.159-160-170.065V272h160V474.063z   M240,240h-76.366L240,154.086V240z M240,105.908L120.808,240H80v-9.775L240,55.678V105.908z M272,272h45.211L272,324.745V272z   M272,373.92L359.361,272h50.977L272,423.511V373.92z M432,303.998c0,72.906-59,135.455-160,170.065v-3.158l160-175.18V303.998z   M432,240H272V44.922c49,24.78,111,25.026,160,0.293V240z" />
                            </svg>
                        </div>
                        <h4 class="icon-box-title">Bảo mật thanh toán</h4>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side text-dark icon-box-money">
                    <div class="icon-box-content">
                        <div class="text-center">
                            <svg version="1.1" width="30px" height="30px" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M490.175,215.984c-7.815-47.427-29.172-91.284-61.76-126.832c-33.393-36.427-76.56-61.724-124.835-73.158
                            			c-64.109-15.182-130.292-4.492-186.358,30.104C61.156,80.692,21.917,135.05,6.733,199.157
                            			C-8.45,263.264,2.241,329.448,36.835,385.515c34.595,56.066,88.952,95.306,153.06,110.49c19.028,4.506,38.229,6.734,57.304,6.732
                            			c45.191-0.001,89.629-12.508,129.054-36.835c4.021-2.481,5.269-7.752,2.788-11.773c-2.481-4.02-7.751-5.27-11.774-2.788
                            			c-52.178,32.194-113.767,42.143-173.429,28.014C70.68,450.186-5.785,326.258,23.384,203.102
                            			C52.553,79.943,176.481,3.478,299.637,32.647c44.926,10.641,85.095,34.178,116.165,68.069
                            			c30.336,33.092,50.216,73.913,57.489,118.051c0.768,4.663,5.178,7.817,9.833,7.051
                            			C487.786,225.048,490.943,220.646,490.175,215.984z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M511.64,308.302c-0.877-2.927-3.25-5.165-6.224-5.87l-15.756-3.731c2.877-16.3,4.117-32.838,3.689-49.277
                            			c-0.122-4.724-4.043-8.439-8.774-8.331c-4.724,0.123-8.453,4.052-8.331,8.774c0.465,17.869-1.189,35.868-4.915,53.495
                            			c-0.961,4.544,1.879,9.024,6.398,10.094l9.325,2.21l-44.886,47.592l-18.773-62.669l9.158,2.169
                            			c2.252,0.536,4.622,0.133,6.574-1.112c1.95-1.245,3.314-3.226,3.779-5.493c10.498-51.149,0.811-103.611-27.276-147.723
                            			c-28.146-44.205-71.737-75.203-122.744-87.284c-107.442-25.445-215.552,41.263-241,148.705
                            			c-7.985,33.717-7.104,69.02,2.548,102.093c9.358,32.061,26.749,61.546,50.293,85.268c1.672,1.685,3.873,2.528,6.072,2.528
                            			c2.179,0,4.359-0.827,6.028-2.483c3.353-3.329,3.374-8.746,0.046-12.1c-44.953-45.29-63.024-109.35-48.337-171.362
                            			C91.808,115.533,190.683,54.528,288.943,77.798c46.647,11.049,86.512,39.397,112.254,79.824
                            			c24.099,37.849,33.388,82.418,26.517,126.406l-14.794-3.503c-2.975-0.707-6.098,0.232-8.196,2.455s-2.849,5.397-1.972,8.325
                            			l27.277,91.059c0.877,2.927,3.25,5.165,6.224,5.87c2.973,0.705,6.098-0.232,8.196-2.455l65.221-69.151
                            			C511.765,314.404,512.517,311.23,511.64,308.302z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M354.675,414.64c-2.481-4.021-7.751-5.269-11.773-2.788c-41.629,25.687-90.768,33.626-138.369,22.35
                            			c-23.864-5.651-45.925-15.773-65.573-30.083c-3.82-2.782-9.171-1.939-11.952,1.879c-2.781,3.819-1.94,9.171,1.879,11.952
                            			c21.493,15.654,45.618,26.724,71.703,32.902c15.448,3.659,31.037,5.466,46.523,5.466c36.689,0,72.766-10.155,104.775-29.905
                            			C355.908,423.932,357.156,418.661,354.675,414.64z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M284.017,247.413h-75.412c-5.797,0-10.513-4.716-10.513-10.513v-30.717c0-5.797,4.716-10.513,10.513-10.513h94.48
                            			c4.725,0,8.555-3.831,8.555-8.555s-3.831-8.555-8.555-8.555h-48.219v-30.79c0-4.725-3.831-8.555-8.555-8.555
                            			s-8.555,3.831-8.555,8.555v30.79h-29.15c-15.232,0-27.624,12.392-27.624,27.624V236.9c0,15.232,12.392,27.624,27.624,27.624
                            			h75.412c5.797,0,10.513,4.716,10.513,10.513v30.717c-0.001,5.796-4.717,10.513-10.514,10.513h-94.48
                            			c-4.725,0-8.555,3.831-8.555,8.555s3.831,8.555,8.555,8.555h48.219v30.79c0,4.725,3.831,8.555,8.555,8.555
                            			s8.555-3.831,8.555-8.555v-30.79h29.151c15.232,0,27.624-12.392,27.624-27.624v-30.717
                            			C311.641,259.805,299.249,247.413,284.017,247.413z" />
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </div>
                        <h4 class="icon-box-title">Đảm bảo hoàn tiền</h4>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side text-dark icon-box-chat">
                    <div class="icon-box-content">
                        <div class="text-center">
                            <svg version="1.1" width="30px" height="30px" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 472.615 472.615" style="enable-background:new 0 0 472.615 472.615;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M443.077,221.735v-14.966C443.077,92.751,350.326,0,236.308,0S29.538,92.751,29.538,206.769v14.966
                            			C11.618,235.028,0,256.492,0,280.615c0,40.665,33.083,73.846,73.846,73.846h14.769V206.769H73.846
                            			c-8.665,0-16.935,1.477-24.615,4.332v-4.332c0-103.188,83.889-187.077,187.077-187.077s187.077,83.889,187.077,187.077v4.332
                            			c-7.68-2.855-15.951-4.332-24.615-4.332H384v147.692h14.769c5.022,0,10.043-0.492,14.769-1.477v60.554
                            			c0,10.831-8.862,19.692-19.692,19.692h-110.08c-4.037-11.52-14.966-19.692-27.766-19.692h-29.538
                            			c-16.246,0-29.538,13.194-29.538,29.538c0,16.246,13.292,29.539,29.538,29.539H256c12.8,0,23.729-8.271,27.766-19.692h110.08
                            			c21.76,0,39.385-17.723,39.385-39.385v-67.742c23.434-12.308,39.385-36.923,39.385-65.182
                            			C472.615,256.492,460.997,235.028,443.077,221.735z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M354.462,202.463v-30.823l-27.933-4.654c-2.359-10.655-6.57-20.59-12.256-29.513l16.48-23.071l-21.795-21.794
                            			l-23.073,16.479c-8.921-5.685-18.857-9.895-29.511-12.256l-4.655-27.932h-30.822l-4.655,27.932
                            			c-10.654,2.361-20.59,6.571-29.511,12.256l-23.072-16.479l-21.794,21.794l16.479,23.071c-5.686,8.923-9.897,18.858-12.256,29.513
                            			l-27.932,4.654v30.823l27.932,4.655c2.359,10.654,6.57,20.589,12.256,29.512l-16.479,23.072l21.794,21.794l23.072-16.479
                            			c8.921,5.686,18.858,9.896,29.511,12.256l4.655,27.933h30.822l4.655-27.933c10.654-2.36,20.59-6.57,29.511-12.256l23.073,16.479
                            			l21.795-21.794l-16.48-23.072c5.686-8.923,9.897-18.858,12.256-29.512L354.462,202.463z M236.308,233.285
                            			c-25.534,0-46.235-20.7-46.235-46.234c0-25.534,20.701-46.235,46.235-46.235c25.534,0,46.234,20.701,46.234,46.235
                            			C282.542,212.585,261.842,233.285,236.308,233.285z" />
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </div>
                        <h4 class="icon-box-title">Hỗ trợ khách hàng 24/24</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Iocn Box Wrapper -->


        <div class="swiper-container swiper-theme product-deals-wrapper appear-animate mb-7" data-swiper-options="{
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
                                <img src="{{ $product->getFirstMediaUrl('products') }}" style="width: 255px !important; height: 170px !important;" alt="{{ $product->name }}"
                                    width="300" height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a
                                    href="{{ route('products.detail', ['product' => $product->slug]) }}">{{
                                    $product->name }}</a></h4>
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
        <div class="swiper-container swiper-theme post-wrapper mb-10 mb-lg-5 appear-animate" data-swiper-options="{
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
                            <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="{{ $post->name }}" style="width:330px !important;
                            height:200px !important;" style="background-color: #898078;">
                        </a>
                        <div class="post-calendar">
                            <span class="post-day">{{ $post->created_at->format('d') }}</span>
                            <span class="post-month">{{ $post->created_at->format('M') }}</span>
                        </div>
                    </figure>
                    <div class="post-details">
                        <h4 class="post-title"><a href="{{ route('posts.detail', ['post' => $post->slug]) }}">{{
                                $post->name }}</a></h4>
                        <div class="post-content">
                            <p>{{ $post->short_description }}</p>
                        </div>
                        <a href="{{ route('posts.detail', ['post' => $post->slug]) }}"
                            class="btn btn-link btn-dark btn-underline">Chi tiết<i
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