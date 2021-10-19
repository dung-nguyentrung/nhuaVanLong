<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chúng tôi đã nhận được thông tin từ quý khách</title>
</head>
<body>
    @php
        $categories = App\Models\Category::all()->pluck('name_vi', 'slug');
        $setting = App\Models\Setting::first();
    @endphp
    <p>Bộ phận kinh doanh sẽ liên lạc trong vòng 12 giờ tới</p>
    <p>Chân thành cảm ơn quý khách</p>
    <p class="mt-3">Nếu quý khách còn quan tâm đến sản phẩm khác</p>
    <ul>
        @foreach ($categories as $slug => $category)
            <li>
                <a href="{{ route('products.category', ['category' => $slug]) }}">{{ $category }}</a>
            </li>            
        @endforeach
    </ul>
    <h4>Thông tin công ty chúng tôi</h4>
    <p>Email: {{ $setting->email ?? '' }}</p>
    <p>Điện thoại: {{ $setting->phone ?? '' }}</p>
    <p>Fax: {{ $setting->fax ?? '' }}</p>
    <p>Address: {{ $setting->address_vi ?? '' }}</p>
</body>
</html>