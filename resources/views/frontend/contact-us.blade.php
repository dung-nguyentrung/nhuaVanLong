@extends('layouts.base')

@section('content')
<!-- Start of Main -->
<main class="main">
    <x-page-header title="Liên lạc" />

    <!-- Start of PageContent -->
    <div class="page-content contact-us">
        <div class="container">
            <section class="content-title-section mb-10">
                <h3 class="title title-center mb-3">Thông tin liên lạc
                </h3>
            </section>
            <!-- End of Contact Title Section -->

            <section class="contact-information-section mb-10">
                <div class=" swiper-container swiper-theme " data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 1,
                    'breakpoints': {
                        '480': {
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
                    <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-email">
                                <i class="w-icon-envelop-closed"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Địa chỉ email</h4>
                                <p>{{ $setting->email }}</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-headphone">
                                <i class="w-icon-headphone"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Điện thoại</h4>
                                <p>{{ $setting->phone }}</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-map-marker">
                                <i class="w-icon-map-marker"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Địa chỉ</h4>
                                <p>{{ $setting->address_vi }}</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-fax">
                                <i class="w-icon-fax"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Fax</h4>
                                <p>{{ $setting->fax }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of Contact Information section -->

            <hr class="divider mb-10 pb-1">

            <section class="contact-section">
                <div class="row gutter-lg pb-3">
                    <div class="col-lg-12 mb-8">
                        <h4 class="title mb-3">Gửi tin nhắn cho chúng tôi</h4>
                        <form class="form contact-us-form" action="{{ route('contact') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="username">Họ tên của bạn</label>
                                <input type="text" name="name"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Điện thoại của bạn</label>
                                <input type="text" name="phone"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email_1">Địa chỉ email (nếu có)</label>
                                <input type="email" name="email"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message">Tin nhắn</label>
                                <textarea id="message" name="message" cols="30" rows="5"
                                    class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark btn-rounded">Gửi ngay</button>
                        </form>
                    </div>
                </div>
            </section>
            <!-- End of Contact Section -->
        </div>

        <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.0298021509243!2d106.64381581537941!3d20.870848998525283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7a3cbeac5cb7%3A0xa7a7c67131d12793!2sC%C3%B4ng%20Ty%20TNHH%20V%C3%A2n%20Long!5e0!3m2!1svi!2s!4v1633676222026!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <!-- End Map Section -->
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->
@endsection