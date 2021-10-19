@extends('layouts.base')

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
            <form class="form checkout-form" action="#" method="post">
                <div class="row mb-9">
                    <div class="col-lg-7 pr-lg-4 mb-4">
                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Chi tiết đơn hàng
                        </h3>
                        <div class="row gutter-sm">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Họ và tên *</label>
                                    <input type="text" class="form-control form-control-md" name="name"
                                        required placeholder="vd: Nguyễn Văn A">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tên công ty</label>
                            <input type="text" class="form-control form-control-md" name="company_name" placeholder="vd: Công ty ABC">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tỉnh / Thành phố</label>
                                <select name="province" id="province" class="form-control">
                                    <option value="0">-- Chọn --</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Quận / Huyện</label>
                                <select name="district" id="district" class="form-control">
                                    <option value="0">-- Chọn --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phường / Xã</label>
                                <select name="ward" id="ward" class="form-control">
                                    <option value="0">-- Chọn --</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ cụ thể*</label>
                            <input type="text" placeholder="House number and street name"
                                class="form-control form-control-md mb-2" name="address" placeholder="vd: Số 4, Lý Tự Trọng" required>
                        </div>
                        <div class="form-group mb-7">
                            <label>Địa chỉ email *</label>
                            <input type="email" class="form-control form-control-md" name="email" required>
                        </div>
                        <div class="form-group mb-7">
                            <label>Điện thoại *</label>
                            <input type="text" class="form-control form-control-md" name="phone" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="order-notes">Ghi chú</label>
                            <textarea class="form-control mb-0" id="order-notes" name="note" cols="30"
                                rows="4"
                                placeholder="Ghi chú cho đơn hàng của bạn"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <input type="checkbox" name="agree" id="agreePolicy">
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
                                        <tr class="bb-no">
                                            <td class="product-name">Palm Print Jacket <i
                                                    class="fas fa-times"></i> <span
                                                    class="product-quantity">1</span></td>
                                            <td class="product-total">$40.00</td>
                                        </tr>
                                        <tr class="bb-no">
                                            <td class="product-name">Brown Backpack <i class="fas fa-times"></i>
                                                <span class="product-quantity">1</span></td>
                                            <td class="product-total">$60.00</td>
                                        </tr>                                        
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <p>Thuế</p>
                                            </td>
                                            <td>
                                                <p>$100.00</p>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <p>Chi phí vận chuyển</p>
                                            </td>
                                            <td>
                                                <p>Miễn phí</p>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Tổng tiền</b>
                                            </td>
                                            <td>
                                                <b>$100.00</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="payment-methods" id="payment_method">
                                    <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Phương thức thanh toán</h4>
                                    <div class="accordion payment-accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#bank-tranfer" class="collapse">Thanh toán trực tuyến</a>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#banking" class="expand">Chuyển khoản</a>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#delivery" class="expand">Thanh toán khi giao hàng</a>
                                            </div>
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