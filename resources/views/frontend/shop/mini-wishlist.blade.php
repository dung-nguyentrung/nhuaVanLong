@foreach ($wishlists as $item)
<tr>
    <td class="product-thumbnail">
        <div class="p-relative">
            <a href="product-default.html">
                <figure>
                    <img src="{{ $item->model->getFirstMediaUrl('products') }}" alt="{{ $item->name }}" width="300"
                        height="338">
                </figure>
            </a>
            <a href="#" data-id="{{ $item->rowId }}" class="btn btn-close remove-wishlist"><i
                    class="fas fa-times"></i></a>
        </div>
    </td>
    <td class="product-name">
        <a href="{{ route('products.detail', ['product' => $item->model->slug]) }}">
            {{ $item->model->name }}
        </a>
    </td>
    <td class="product-price"><span class="amount">{{ $item->model->price }}</span></td>
    <td class="product-subtotal">
        <a href="#" data-id="{{ $item->model->id }}" class="addToCart btn btn-dark ">Thêm giỏ hàng</a>
    </td>
</tr>
@endforeach