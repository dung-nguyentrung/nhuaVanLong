@foreach ($carts as $item)
<tr>
    <td class="product-thumbnail">
        <div class="p-relative">
            <a href="{{ route('products.detail', ['product' => $item->model->slug]) }}">
                <figure>
                    <img src="{{ $item->model->getFirstMediaUrl('products') }}" alt="{{ $item->name }}" width="300"
                        height="338">
                </figure>
            </a>
            <a href="#" data-id="{{ $item->rowId }}" class="btn btn-close remove-cart"><i class="fas fa-times"></i></a>
        </div>
    </td>
    <td class="product-name">
        <a href="{{ route('products.detail', ['product' => $item->model->slug]) }}">
            {{ $item->model->name }}
        </a>
    </td>
    <td class="product-price"><span class="amount">{{ number_format($item->model->price) }} đ</span></td>
    <td class="product-quantity">
        <form action="{{ route('cart.update') }}" method="post">
            @csrf
            <div class="form-group">
                <input class="form-control" name="quantity" width="3" type="number" value="{{ $item->qty }}" min="1"
                    max="100000">
                <input type="hidden" name="rowId" value="{{ $item->rowId }}">
            </div>
    </td>
    <td>
        <button type="submit" class="btn btn-success"><i class="fa fa-arrow-up"></i></button>
        </form>
    </td>
    <td class="product-subtotal">
        <span class="amount">{{ number_format($item->qty * $item->model->price) }} đ</span>
    </td>
</tr>
@endforeach