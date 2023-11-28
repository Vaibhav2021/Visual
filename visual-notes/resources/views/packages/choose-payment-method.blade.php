<div class="row mt-3">
    <input type="hidden" name="package" value="{{$packages->id}}" />
  

    <center>
        <h2>Congratulations!</h2>
    </center>
    <span class="text-center mb-3">We are almost there...</span>
    <center>
        <span class="h6 text-warning">$</span>
        <span class="h1 text-warning">{{$packages->price}}</span>
        <span class="h6 text-warning">(USD)</span>
    </center>

    <center>
        <strong class="text-info">Up to {{$packages->limit}} Websites</strong> <br/>
        <strong class="text-info">Subscription Type : {{$packages->type}}</strong>
    </center>

    @if ($setting['razorpay_payment_gateway'] == 'active')
        <input type="hidden" name="razorpay_key" value="{{ $setting->razorpay_client_id ?? '' }}" />
        <div class="text-center mt-3">
            <button type="button" class="btn btn-light gateway-btn" data-gateway="razorpay">Checkout with
                <img src="{{ asset('assets/images/razorpay-logo.png') }}" alt="razorpay" height="70px" width="100px"/></button>
        </div>
    @endif

    @if ($setting['stripe_payment_gateway'] == 'active')
        <input type="hidden" name="stripe_key" value="{{ $setting->stripe_client_id ?? '' }}" />
        <div class="text-center mt-3">
            <button type="button" class="btn btn-light gateway-btn" data-gateway="stripe">Checkout with Stripe
                <img src="{{ asset('assets/images/razorpay-logo.png') }}" alt="stripe" height="70px" width="100px"/></button>
        </div>
    @endif

    @if ($setting['paypal_payment_gateway'] == 'active')
    <input type="hidden" name="paypal_key" value="{{ $setting->paypal_client_id ?? '' }}" />
    <div class="text-center mt-3">
        <button type="button" class="btn btn-light gateway-btn" data-gateway="paypal">Checkout with Paypal
            <img src="{{ asset('assets/images/razorpay-logo.png') }}" alt="paypal" height="70px" width="100px"/></button>
    </div>
@endif

    {{-- @if ($setting['stripe_on_off'] == 'on')
        <h6 class="text-center mt-3">OR</h6>
        <div class="text-center mt-3">
            <button type="button" class="btn btn-outline-light gateway-btn" data-gateway="stripe">Checkout with
                <img src="{{ asset('assets/static/images/payment/stripe.png') }}" alt="stripe" /></button>
        </div>
    @endif

    @if ($setting['paypal_on_off'] == 'on')
        <h6 class="text-center mt-3">OR</h6>
        <div class="text-center mt-3">
            <button type="button" class="btn btn-outline-light gateway-btn" data-gateway="paypal">Checkout with
                <img src="{{ asset('assets/static/images/payment/paypal.png') }}" alt="paypal" /></button>
        </div>
    @endif --}}

    <center>
        <img src="{{ asset('assets/static/images/payment/PaymentMode.png') }}" alt="payment options" class="img-fluid mt-5" /></button>
    </center>
</div>