<h4>Thong tin thanh toan</h4>
<div class="border p-2">
    <form action="{{ route('cart.checkout-complete') }}" method="POST" id="frm-checkout">
        @csrf
        <div class="form-group">
            <input type="radio" value="1" name="payment_type" id="payment-type-1" checked class="payment-type">
            <label for="payment-type-1">Thanh toán tại nhà</label>
            <input type="radio" value="2" name="payment_type" id="payment-type-2" class="payment-type">
            <label for="payment-type-2">Thanh toán bằng Credit Card</label>
        </div>
        <div class="form-group" id="payment-info">
            <div class="border p-2">
                <div class="form-group mb-2">
                    <label for="">Credit Card Number</label>
                    <input type="number" value="" name="cc_number" class="form-control" placeholder="" autocomplete="off">
                </div>
                <div class="form-group mb-2">
                    <label for="">Expiration Date</label>
                    <input type="text" value="" name="cc_expire_date" class="form-control" placeholder="" autocomplete="off">
                </div>
                <div class="form-group mb-2">
                    <label for="">Signature/ CVV2 Code</label>
                    <input type="number" value="" name="cc_cvv" class="form-control" placeholder="" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-primary" id="btn-checkout" onclick="return confirm('Are you sure checkout your Order?')">Thanh toán</button>
        </div>
    </form>
</div>