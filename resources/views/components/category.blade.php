@php
    $name = 'name_'.config('app.locale')
@endphp
<!-- Start of Sticky Sidebar -->
<div class="sticky-sidebar">
    <!-- Start of Collapsible widget -->
    <div class="widget widget-collapsible">
        <h3 class="widget-title"><span>Danh mục sản phẩm</span></h3>
        <ul class="widget-body filter-items search-ul">
            <li><a href="/shop">TẤT CẢ</a></li>
            @foreach ($categories as $category)
            <li><a href="{{ route('products.category', ['category' => $category->slug]) }}">{{ $category->$name }}</a></li>                                        
            @endforeach
        </ul>
    </div>
    <!-- End of Collapsible Widget -->
</div>
<!-- End of Sidebar Content -->