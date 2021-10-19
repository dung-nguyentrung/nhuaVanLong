@extends('layouts.base')

@section('content')
<!-- Start of Main -->
<main class="main">
    @php
        $description = 'description_'.config('app.locale');
    @endphp
    <x-page-header title="Giới thiệu"></x-page-header>

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <section class="introduce mb-10 pb-10">
                <h2 class="title title-center">
                    Công ty TNHH Nhựa Vân Long
                </h2>
                <p class=" mx-auto text-center">{{ $setting->$description ?? '' }}</p>
                <div class="embed-responsive embed-responsive-16by9">
                <iframe width="1240" height="535" src="https://www.youtube.com/embed/5ZHDN6MIxGc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </section>

            <section class="customer-service mb-7">
                <div class="row align-items-center">
                    <div class="col-md-6 pr-lg-8 mb-8">
                        <h2 class="title text-left">Chuyên gia công và sản xuất các sản phẩm từ nhựa.</h2>
                        <div class="accordion accordion-simple accordion-plus">
                            <div class="card border-no">
                                <div class="card-body expanded" id="collapse3-1">
                                    <p class="mb-0">
                                        Công ty có 2 nhà máy sản xuất với nhiều trang thiết bị hiện đại, tổng diện tích gần 20,000 m2.
                                        Trải qua 20 năm xây dựng và phát triển, hiện tại Vân Long đã vươn lên trở thành một trong những công ty hàng đầu về sản xuất và gia công các sản phẩm nhựa tại Hải Phòng.Với kinh nghiệm nhiều năm trong lĩnh vực sản xuất nhựa, hiện chúng tôi đang là đối tác uy tín của các thương hiệu hàng đầu như LG Electronics, Tohoku Pioneer, Idemitsu, JX Nippon, Chevon, Vinfast,.....
                                        Vân Long đã đạt được nhiều danh hiệu, giải thưởng và sự ghi nhận của khách hàng. Đó là sự nỗ lực không mệt mỏi của tập thể Vân Long với mục tiêu mang lại giá trị cho khách hàng và cộng đồng.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-8">
                        <figure class="br-lg">
                            <img src="assets/images/pages/about_us/2.jpg" alt="Banner" width="610" height="500"
                                style="background-color: #CECECC;" />
                        </figure>
                    </div>
                </div>
            </section>

            <section class="count-section mb-10 pb-5">
                <div class="swiper-container swiper-theme" data-swiper-options="{
                    'slidesPerView': 1,
                    'breakpoints': {
                        '768': {
                            'slidesPerView': 2
                        },
                        '992': {
                            'slidesPerView': 3
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-lg-3 cols-md-2 cols-1">
                        <div class="swiper-slide counter-wrap">
                            <div class="counter text-center">
                                <span class="count-to" data-to="15">400</span>
                                <span>+</span>
                                <h4 class="title title-center">Nhân Viên</h4>
                            </div>
                        </div>
                        <div class="swiper-slide counter-wrap">
                            <div class="counter text-center">
                                <span class="count-to" data-to="25">10,000</span>
                                <span>+</span>
                                <h4 class="title title-center">Khách hàng</h4>
                            </div>
                        </div>
                        <div class="swiper-slide counter-wrap">
                            <div class="counter text-center">
                                <span class="count-to" data-to="100">20</span>
                                <span>+</span>
                                <h4 class="title title-center">Năm kinh doanh</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
        </div>

        <section class="boost-section pt-10 pb-10">
            <div class="container mt-10 mb-9">
                <div class="awards-wrapper">
                    <h4 class="title title-center font-weight-bold mb-10 pb-1 ls-25">Tại sao chọn chúng tôi ?</h4>
                    <div class="swiper-container swiper-theme" data-swiper-options="{
                        'spaceBetween': 20,
                        'slidesPerView': 1,
                        'breakpoints': {
                            '768': {
                                'slidesPerView': 2
                            },
                            '992': {
                                'slidesPerView': 3
                            },
                            '1200': {
                                'slidesPerView': 4
                            }
                        }
                    }">
                        <div class="swiper-wrapper row">
                            <div class="swiper-slide image-box-wrapper col-lg-4">
                                <div class="image-box text-center">
                                    <figure>
                                        <img style="width: 80px !important;" src="assets/images/pages/about_us/1.png" alt="Chất lượng là danh dự" />
                                    </figure>
                                    <p> <b>Chất lượng là danh dự</b><br>
                                        Với kinh nghiệm sản xuất trên 20 năm, Nhựa Vân Long tự tin khẳng định sản phẩm của chúng tôi có chất lượng hàng đầu thị trường hiện nay. Với dòng sản phẩm dành cho nông lâm ngư nghiệp đòi hỏi độ bền bỉ và tuổi thọ cao, chúng tôi hoàn toàn có thể đáp ứng</p>
                                </div>
                            </div>
                            <div class="swiper-slide image-box-wrapper col-lg-4">
                                <div class="image-box text-center">
                                    <figure>
                                        <img style="width: 80px !important;" src="assets/images/pages/about_us/2.png" alt="Mức giá cạnh tranh"  />
                                    </figure>
                                    <p><b>Mức giá cạnh tranh</b><br>
                                        Với kinh nghiệm làm việc với bà con ngư dân nuôi trồng thủy sản tại tỉnh Quảng Ninh trong nhiều năm, chúng tôi thường xuyên cải tiến và cho ra đời các sản phẩm có chất lượng tốt đi kèm với mức giá cạnh tranh, nhằm hỗ trợ phần nào đó chi phí đầu tư cho người nuôi trồng.</p>
                                </div>
                            </div>
                            <div class="swiper-slide image-box-wrapper col-lg-4">
                                <div class="image-box text-center">
                                    <figure>
                                        <img style="width: 80px !important;" src="assets/images/pages/about_us/3.png" alt="Hỗ trợ hết mình"/>
                                    </figure>
                                    <p><b>Hỗ trợ hết mình</b><br>
                                        Nhựa Vân Long tin rằng việc bán hàng phải luôn gắn liền với chăm sóc khách hàng. Chúng tôi muốn đồng hành cùng Quý khách và hỗ trợ trong suốt quá trình sử dụng sản phẩm của Vân Long.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <section class="mb-10">
                <h2 class="title title-center mb-5">Đánh giá từ khách hàng</h2>
                <div class="swiper-container shadow-swiper swiper-theme show-code-action" data-swiper-options="{
                    'slidesPerView': 1,
                    'spaceBetween': 20,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '992': {
                            'slidesPerView': 3
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-lg-3 cols-sm-2 cols-1">
                        @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide testimonial-wrap">
                            <div class="testimonial testimonial-centered testimonial-shadow">
                                <div class="testimonial-info">
                                    <figure class="testimonial-author-thumbnail">
                                        <img src="{{ $testimonial->getFirstMediaUrl('testimonials') }}" alt="{{ $testimonial->name }}"
                                            width="100" height="100" />
                                    </figure>
                                </div>
                                <blockquote>
                                    {{ $testimonial->testimonial }}
                                </blockquote>
                                <cite>
                                    {{ $testimonial->name }}<span>{{ $testimonial->mission }}</span>
                                </cite>
                            </div>
                        </div>                            
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
        </div>
    </div>
</main>
<!-- End of Main -->
@endsection