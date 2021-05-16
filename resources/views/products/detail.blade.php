@extends('layouts.master')
{{-- set page title --}}
@section('title', $product->name)

@section('content')
<hr>
    <section class="product-detail">
        <div class="row">
            <div class="col-6">
                <div class="product-thumbnail">
                    <img src="{{ asset($product->image)}}" alt="{{ $product->image }}">
                </div>
                <hr>
                <div class="product__details__pic__slider owl-carousel">
                    @if ($product->product_images)
                        @foreach ($product->product_images as $product_image)
                                <img data-imgbigurl="{{ $product_image->url }}"
                        src="{{ $product_image->url }}" alt="">
                        @endforeach
                    @endif
                </div>
                <hr>
            </div>
            <div class="col-6">
                
                <hr>
                <div class="col-6">
                    <div class="product-description">
                        <form action="{{ route('cart.add-cart', $product->id) }}" method="POST">
                            @csrf
                            <h4>{{ $product->name }}</h4>
                            <hr>
                            <p class="product-comment">
                                <span>(Xem 98 đánh giá)</span>
                            </p>
                            <hr>
                            <p class="product-price">{{ number_format($product->price) }} VND</p>
                            <hr>
                            <p class="product-quantity">
                                <label>Quantity</label>
                                <span><input type="number" name="quantity" required></span>
                            </p>
                            <p>
                                <button type="submit">Add Cart</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    
@endpush

@push('js')
    
@endpush
{{-- @section('scripts')
    <script>
        function addCart(paramIid) {
            $.ajax({
                type: "POST",
                url: `{{ route('cart.add-cart') }}`,
                data: {id: paramIid},
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (response) {
                    console.log(response);
                }
            });
        }
    </script>
@endsection  --}}