@extends('app')
@section('content')
<div class="page-page">
    <div class="page-heading">
        <h2 class="d-flex align-items-center mb-0 fw-semibold">Payment Settings</h2>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col">

                <div class="card card-shadow border-0 rounded-8px p-4 cursor-pointer">
                    <section class="row gx-0">
                        <div class="col-md-12 col-12 p-md-2 ps-md-0">
                            <div class="row">
                                <form method="post" action="{{route('settings.payment.save')}}"
                                    class="form form-vertical visual-notes-ajax-form">
                                    @csrf
                                    <input type="hidden" name="setting_id" value="{{$payment_settings->id ?? '' }}">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4 mt-2">
                                                <label for="role-name"><h3>Stripe</h3></label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2 mb-0">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="active" name="stripe_payment_gateway" @checked(!empty($payment_settings) && $payment_settings->stripe_payment_gateway == 'active')>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                       Active
                                                      </label>
                                                  </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label for="role-name">Client Id</label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2 mb-0">
                                                <input type="text" id="role-name" class="form-control" name="stripe_client_id"
                                                    placeholder="Enter Client ID" value="{{$payment_settings->stripe_client_id ?? ''}}">
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="role-name">Client Secrete*</label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2">
                                                <input type="text" id="role-name" class="form-control" name="stripe_client_secrete"
                                                    placeholder="Enter Client Secrete" value="{{$payment_settings->stripe_client_secrete ?? ''}}">
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="role-name">Webhook Url*</label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2">
                                                <input type="text" id="role-name" class="form-control" name="stripe_webhook"
                                                    value="{{route('stripe.webhook')}}" readonly>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="role-name"><h3>Razorpay </h3></label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2 mb-0">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="active" name="razorpay_payment_gateway" @checked(!empty($payment_settings) && $payment_settings->razorpay_payment_gateway == 'active')>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                       Active
                                                      </label>
                                                  </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label for="role-name">Client Id</label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2 mb-0">
                                                <input type="text" id="role-name" class="form-control" name="razorpay_client_id"
                                                    placeholder="Enter Client ID" value="{{$payment_settings->razorpay_client_id ?? ''}}">
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="role-name">Client Secrete*</label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2">
                                                <input type="text" id="role-name" class="form-control" name="razorpay_client_secrete"
                                                    placeholder="Enter Client Secrete" value="{{$payment_settings->razorpay_client_secrete ?? ''}}">
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="role-name">Webhook Url*</label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2">
                                                <input type="text" id="role-name" class="form-control" name="razorpay_webhook"
                                                    value="{{route('razorpayWebhook')}}" readonly>
                                            </div>


                                            <div class="col-md-4 mt-2">
                                                <label for="role-name"><h3>Paypal </h3></label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2 mb-0">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="active" name="paypal_payment_gateway" @checked(!empty($payment_settings) && $payment_settings->paypal_payment_gateway == 'active')>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                       Active
                                                      </label>
                                                  </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="role-name">Payment Type</label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2 mb-0">
                                                <div>
                                                    <input class="form-check-input" type="radio" id="checkboxNoLabel" value="sendbox" name="paypal_payment_type" @checked(!empty($payment_settings) && $payment_settings->paypal_payment_type == 'sendbox')>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                       Sendbox
                                                      </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                      <input class="form-check-input" type="radio" id="checkboxNoLabel" value="live" name="paypal_payment_type" @checked(!empty($payment_settings) && $payment_settings->paypal_payment_type == 'live')>
                                                      <label class="form-check-label" for="exampleRadios1">
                                                         Live
                                                        </label>
                                                  </div>

                                                  
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="role-name">Client Id</label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2 mb-0">
                                                <input type="text" id="role-name" class="form-control" name="paypal_client_id"
                                                    placeholder="Enter Client ID" value="{{$payment_settings->paypal_client_id ?? ''}}">
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="role-name">Client Secrete*</label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2">
                                                <input type="text" id="role-name" class="form-control" name="paypal_client_secrete"
                                                    placeholder="Enter Client Secrete" value="{{$payment_settings->paypal_client_secrete ?? ''}}">
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="role-name">Webhook Url*</label>
                                            </div>
                                            <div class="col-md-8 form-group mt-2">
                                                <input type="text" id="role-name" class="form-control" name="paypal_webhook"
                                                    value="{{route('paypal.webhook')}}" readonly>
                                            </div>
                                            

                                            
                                            

                                                    


                                                <div class="col-md-8 form-group">
                                                    <div class="d-flex justify-content-between align-items-center">

                                                         
                                                    </div>
                                                </div>

                                            
                                    <div class="col-12 d-flex justify-content-center gap-1 mt-4">
                                        <button type="submit" class="btn btn-dark-theme me-1 mb-1">Submit</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary bg-theme me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        </div>
    </div>
</div>
</div>
@endsection
