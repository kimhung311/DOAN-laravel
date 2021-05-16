@php
$cartNumber = 0;
if (Session::has('carts')) {
    foreach (Session::get('carts') as $key => $value) {
        $cartNumber += intval($value['quantity']);
    }
}
@endphp

<a href="{{ route('cart.cart-info') }}"><i class="fas fa-cart-plus"></i><span class="text">Giỏ hàng: <span class="number">{{ $cartNumber }}</span></span></a>