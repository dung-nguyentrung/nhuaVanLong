@extends('layouts.base')
@section('title', 'Thanh toán')
@section('content')
<!-- Start of Main -->
<main class="main checkout">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li><span>Thanh toán</span></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->


    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <form class="form checkout-form" action="{{ route('order.confirm') }}" method="post">
                @csrf
                <div class="row mb-9">
                    <div class="col-lg-7 pr-lg-4 mb-4">
                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Chi tiết đơn hàng
                        </h3>
                        <div class="row gutter-sm">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Họ và tên (<span style="color: red">*</span>)</label>
                                    <input type="text" class="form-control form-control-md" name="name"
                                        required placeholder="Nguyễn Văn A" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tên công ty (<span style="color: red">*</span>)</label>
                            <input type="text" class="form-control form-control-md" name="company_name" placeholder="Công ty ABC">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tỉnh / Thành phố (<span style="color: red">*</span>)</label>
                                <select name="province_id" id="province" class="form-control">
                                    <option value="">-- Chọn --</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Quận / Huyện (<span style="color: red">*</span>)</label>
                                <select name="district_id" id="district" class="form-control">
                                    <option value="">-- Chọn --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phường / Xã (<span style="color: red">*</span>)</label>
                                <select name="ward_id" id="ward" class="form-control">
                                    <option value="">-- Chọn --</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ cụ thể (<span style="color: red">*</span>)</label>
                            <input type="text"
                                class="form-control form-control-md mb-2" value="{{ Auth::user()->address }}" name="address" placeholder="Số 4, Lý Tự Trọng" required>
                        </div>
                        <div class="form-group mb-7">
                            <label>Địa chỉ email (<span style="color: red">*</span>)</label>
                            <input type="email" value="{{ Auth::user()->email }}" class="form-control form-control-md" placeholder="khachhang@vanlongplastic.com.vn" name="email" required>
                            <input type="hidden" name="tax" value="{{ Cart::tax(0,'','') }}">
                            <input type="hidden" name="shipping" value="0">
                            <input type="hidden" name="subtotal" value="{{ Cart::subtotal(0,'','') }}">
                            <input type="hidden" name="total" value="{{ Cart::total(0,'','') }}">
                        </div>
                        <div class="form-group mb-7">
                            <label>Điện thoại (<span style="color: red">*</span>)</label>
                            <input type="text" value="{{ Auth::user()->phone }}" class="form-control form-control-md" placeholder="0123456789" name="phone" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="order-notes">Ghi chú</label>
                            <textarea class="form-control mb-0" id="order-notes" name="note" cols="30"
                                rows="4"
                                placeholder="Ghi chú cho đơn hàng của bạn"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <input type="checkbox" name="agree" id="agreePolicy" required>
                            <label for="agreePolicy">Đồng ý với <a href="/purchase-policy">chính sách mua hàng</a> của chúng tôi</label>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                        <div class="order-summary-wrapper sticky-sidebar">
                            <h3 class="title text-uppercase ls-10">Đơn hàng của bạn</h3>
                            <div class="order-summary">
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                <b>Sảm phẩm</b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::instance('cart')->content() as $item)
                                        <tr class="bb-no">
                                            <td class="product-name">{{ $item->model->name }}<i
                                                    class="fas fa-times"></i> <span
                                                    class="product-quantity">{{ $item->qty }}</span>
                                                    <input type="hidden" name="products[]" value="{{ $item->model->id }}">
                                                    <input type="hidden" name="quantity[{{ $item->model->id }}]" value="{{ $item->qty }}">
                                                    <input type="hidden" name="price[{{ $item->model->id }}]" value="{{ $item->model->price }}">
                                            </td>
                                            <td class="product-total">{{ number_format($item->qty * $item->model->price) }} đồng</td>
                                        </tr>                                            
                                        @endforeach                                        
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <p>Thuế</p>
                                            </td>
                                            <td>
                                                <p>{{ Cart::instance('cart')->tax(0,'',',') }} đồng</p>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <p>Tổng tiền</p>
                                            </td>
                                            <td>
                                                <p>{{ Cart::instance('cart')->subtotal(0,'',',') }} đồng</p>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Thành tiền</b>
                                            </td>
                                            <td>
                                                <b>{{ Cart::instance('cart')->total(0,'',',') }} đồng</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="payment-methods" id="payment_method">
                                    <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Phương thức vận chuyển</h4>
                                    <div class="accordion payment-accordion">
                                        <div class="mt-3">
                                            <input type="radio" name="shipping_method" checked id="customer" value="0">
                                            <label for="customer">Quý khách nhận hàng trực tiếp tại công ty</label> 
                                        </div>
                                        <div class="mt-3">
                                            <input type="radio" name="shipping_method" id="company" value="1">
                                            <label for="company">Công ty giao hàng cho quý khách</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group place-order pt-6">
                                    <button type="submit" class="btn btn-dark btn-block btn-rounded">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#search').keyup(function (e) { 
            var url = "{{ route('orders.search') }}";
            $.ajax({
                type: "get",
                url: url,
                data: {
                    search: $(this).val(),
                },
                dataType: "json",
                success: function (response) {
                    $('#lstProducts').html(response);
                }
            });
        });
        $('#province').change(function () { 
            var id = $(this).val();
            var url = "{{ route('orders.sortByProvince', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    $('#district').html(data.output);
                    $('#ward').html(data.outputWard);
                }
            });
        });
        $('#district').change(function () { 
            var id = $(this).val();
            var url = "{{ route('orders.sortByDistrict', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    id: id
                },
                dataType: "json",
                success: function (response) {
                    $('#ward').html(response);
                }
            });
        });
    });
</script>
@endpush