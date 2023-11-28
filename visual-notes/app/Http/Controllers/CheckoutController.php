<?php

namespace App\Http\Controllers;

use App\Library\Paypal;
use App\Models\Package;
use App\Models\PaymentDetails;
use App\Models\PaymentSettings;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Stripe\StripeClient;

class CheckoutController extends Controller
{


    public function invoiceNumber()
    {
        $InvoiceNumber = PaymentDetails::get();
        return date('dmY') . '-00' . count($InvoiceNumber) + 1;
    }
    public function checkout(Request $request)
    {
        $package = Package::find($request->packageId);
        $setting = PaymentSettings::first();
        $gateway = $request->gateway;
        // dd($gateway);
        if (isset($setting->id)) {
            switch ($gateway) {
                case 'razorpay':
                    if (!empty($request->subscription_id)) {

                        $this->razorpayCancel(true);

                        $subscription_id = $request->subscription_id;
                        // $userID, $packagesID, $transactionID, $subscriptionID, $gateway, $totalPayment
                        $this->paymentSave(Auth::user()->id, $package->id, $request->payment_id, $subscription_id, 'Razorpay', $package->price);
                        return response()->json(['status' => 200, 'msg' => 'Payment completed successfully!']);
                    }
                    $response = $this->razorpayCreate($package, $setting);
                    return response()->json($response);
                    break;
                case 'stripe':
                    $response = $this->StripeCreate($package, $setting);
                    return response()->json($response);
                    break;
                case 'paypal':
                    $response = $this->paypalCreate($package, $setting);
                    return response()->json($response);
                    break;
                default:
                    return response()->json(['success' => 403, 'html' => 'Payment Settings Not Found!']);
            }
        } else {
            return response()->json(['success' => 403, 'html' => 'Payment Settings Not Found!']);
        }
    }

    private function razorpayCreate($package, $setting)
    {

        // dd($setting->razorpay_client_id,$setting->razorpay_client_secrete);
        $api = new Api($setting->razorpay_client_id, $setting->razorpay_client_secrete);
        $price =  ($package->price * 100);

        $obj =  $api->plan->create(
            array(
                'period' => $package->type,
                'interval' => 1,
                'item' => array(
                    'name'          => $package->name,
                    'description'   => $package->id .  ', No. of Websites' . $package->limit .  ', Package Type' . $package->type .  ', Rate' . $package->price,
                    'amount'        => $price,
                    'currency'      => 'INR'
                )
            )
        );

        $planArray = $obj->toArray();

        $subscriptionObje =  $api->subscription->create(
            array(
                'plan_id' => $planArray['id'],
                'total_count' => 12,
                'quantity' => 1,
                // 'start_at' => strtotime($day),
                'expire_by' => 2532470340,
                'customer_notify' => 1,
                'addons' => array(
                    array(
                        'item' => array(
                            // 'name' => 'subscription charges',
                            // 'amount' => $price,
                            // 'currency' => 'USD'
                        )
                    )
                ),
                'notes' => array('notes_key_1' => $planArray['item']['description']),
            )
        );

        $subscriptionArray = $subscriptionObje->toArray();
        return ['status' => 200, 'url' => route('packages.checkout'), 'Razorpay_key' => $setting->razorpay_client_id, 'subscription_id' => $subscriptionArray['id'], 'description' => $subscriptionArray['notes']['notes_key_1']];
    }




    public function razorpayCancel($return = false)
    {
        
        if (Auth::user()) {
            $setting = PaymentSettings::first();
            $api = new Api($setting->razorpay_client_id, $setting->razorpay_client_secrete);
            $payment = PaymentDetails::latest()
                ->where('user_id', Auth::user()->id)
                ->where('subscription_status', 1)
                ->first();
            if (isset($payment->id)) {
               

                $res = $api->subscription->fetch($payment->subscriptionID)->cancel(['cancel_at_cycle_end' => 0]);
                // dd($res);
                $payment->subscription_status = 0;
                $payment->save();
                if (!$return)
                    return response()->json(['status' => 200, 'msg' => 'Subscription cancelled successfully!']);
            }
        }
    }

    public  function razorpayWebhook(Request $request)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // file_put_contents("./webhook_data2.json", json_encode($data, JSON_PRETTY_PRINT));

        $event      = $data['event'];
        $payload    = $data['payload'];

        switch ($event) {
            case 'subscription.charged':
                $subscription   = $payload['subscription']['entity'];
                $payment        = $payload['payment']['entity'];
                $subscription_id = $subscription['id'];
                $payment_id     = $payment['id'];

                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                if (!@$order) {
                    die();
                }
                $setting = PaymentSettings::first();
                $api = new Api($setting->razorpay_key, $setting->razorpay_secret);
                $plan_details = $api->plan->fetch($subscription['plan_id']);

                // $userID, $packagesID, $transactionID, $subscriptionID, $gateway, $totalPayment
                $this->paymentSave($order->user_id, $order->package_id, $payment_id, $subscription_id, 'Razorpay', ($plan_details->item->amount / 100));
                break;

            case 'subscription.pending':
                $subscription   = $payload['subscription']['entity'];
                $subscription_id = $subscription['id'];
                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                $order->subscription_status = 0;
                $order->save();
                break;

            case 'subscription.cancelled':
                $subscription   = $payload['subscription']['entity'];
                $subscription_id = $subscription['id'];
                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                $order->subscription_status = 0;
                $order->save();
                break;

            case 'subscription.paused':
                $subscription   = $payload['subscription']['entity'];
                $subscription_id = $subscription['id'];
                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                $order->subscription_status = 0;
                $order->save();
                break;

            case 'subscription.resumed':
                $subscription   = $payload['subscription']['entity'];
                $subscription_id = $subscription['id'];
                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                $order->subscription_status = 1;
                $order->save();
                break;

            case 'subscription.halted':
                $subscription   = $payload['subscription']['entity'];
                $subscription_id = $subscription['id'];
                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                $order->subscription_status = 0;
                $order->save();
                break;

            default:
                break;
        }
    }


    //stripe payment gateway


    private function StripeCreate($package, $setting)
    {
        
        if ($package->type !== 'fixed') {
            $stripe = new StripeClient($setting->stripe_client_secrete);
            $price =  $package->price * 100;
            $stripe_metadata    = array(
                'product_id'    => $package->id,
                'variation_id'  => '',
                'product_name'  => $package->name,
                'first_price'   =>  $price,
                'after_price'   =>  $price,
                'currency'      => 'INR',
                'email'         => Auth::user()->email,
            );

            $plan = $stripe->plans->create([
                'amount' => $price,
                'currency' => 'INR',
                'interval' => $package->type=='yearly'?'year':'month',
                'product' => [
                    'name' =>  $package->name,
                    'metadata' => $stripe_metadata,
                ],
            ]);

            if (@$plan) {
                $subscription_fields    = [
                    'customer'          => $stripe->customers->create(['email' => Auth::user()->email, 'name' => Auth::user()->name])->id,
                    'items'             => [['price' => $plan->id],],
                    'payment_behavior'  => 'default_incomplete',
                    'expand'            => ['latest_invoice.payment_intent'],
                    'metadata'          => $stripe_metadata
                ];
                $subscriptions      = $stripe->subscriptions->create([$subscription_fields]);
                // dd($subscriptions);
                if (@$subscriptions->latest_invoice->hosted_invoice_url) {
                    return ['status' => 200, 'url' => $subscriptions->latest_invoice->hosted_invoice_url];
                }
            }

        } else {
            $price = $package->price;
            $stripe = new StripeClient($setting->stripe_client_secret);
            $stripe_metadata    = array(
                'address'       => '',
                'product_id'    => $package->id,
                'sale_price'    => $price,
                'email'         => Auth::user()->email,
                'currency' => 'INR',
            );

            $checkout_session = $stripe->checkout->sessions->create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'INR',
                        'product_data' => [
                            'name' => Auth::user()->name,
                        ],
                        'unit_amount' => $price * 100,
                    ],
                    'quantity' => 1,
                ]],
                "metadata"    => $stripe_metadata,
                'mode'        => 'payment',
                'customer_email' => Auth::user()->email,
                'success_url' => route('stripeSuccess') . '?session_id={CHECKOUT_SESSION_ID}&UserID=' . Auth::user()->id . '&package=' . $package->id . '&price=' . $price,
                'cancel_url'  => route('packages.checkout'),
                'billing_address_collection' => 'auto',
            ]);
            return ['status' => 200, 'url' => $checkout_session->url];
        }
    }

    public function stripeSuccess(Request $request)
    {
        $package = Package::find($request->package);
        
        // $userID, $packagesID, $totalWebsite, $transactionID, $subscriptionID, $paymentMode, $totalPayment
        $this->paymentSave($request->UserID, $package->id, $request->session_id, '', 'Stripe', $request->price);

        Session::flash('success', 'Payment has been successfully!');
        return redirect(route('TransactionHistory'));
    }

    public function stripeCancel($payment, $return=false){

        $setting = PaymentSettings::first();
        $stripe = new StripeClient($setting->stripe_client_secret);
        try {
            $subscription   = $stripe->subscriptions->cancel($payment->subscriptionID,[]);
            if( !$return )
                return response()->json(['status'=>200, 'msg'=>'Subscription cancelled successfully!']);
        }catch(Exception $e) { }
    }

    public function stripeWebhook(Request $request){
        $request    = json_decode(  file_get_contents( 'php://input' ) ,true ); 
        // $request    = json_decode(  file_get_contents( STRIPE_PLUGIN_DIR.'payment_succeeded.json' ) ,true ); //for test
        $type = @$request['type'];

        $setting = PaymentSettings::first();
        $stripe = new StripeClient($setting->stripe_client_secret);

        switch ($type) {
            case 'invoice.payment_succeeded':
                $invoice = $request['data']['object'];

                if ($invoice['billing_reason']=='subscription_create') {

                    

                    $transactionid      = $invoice['payment_intent'];
                    $subscription_id    = $invoice['subscription'];

                    if (@$transactionid) {
                        $subscription   = $stripe->subscriptions->retrieve( $subscription_id, [] );
                        $update_payment = ['metadata' => json_decode(json_encode($subscription->metadata),true)];
                        $stripe->paymentIntents->update( $transactionid, $update_payment );
                        $payment    = $stripe->paymentIntents->retrieve( $transactionid, [] );
                        if(@$payment->status=='succeeded'){
                            $user_email = $payment->metadata->email;
                            $user = User::where('email', $user_email)->first();
                            $package = Package::find($payment->metadata->product_id);

                            // cancel old subscription
                            $payment = PaymentDetails::latest()
                            ->where('user_id', $user->id)
                            ->where('subscription_status', 1)
                            ->first();
                            if( isset($payment->id) ){
                                $this->stripeCancel($payment, true);
                            }
                            // end cancel

                            $this->paymentSave($user->id, $package->id, $transactionid, $subscription_id, 'Stripe', $package->price);
                        }
                    }                    
                }
                elseif ($invoice['billing_reason']=='subscription_cycle') {
                    $subscription_id    = $invoice['subscription'];
                    $payment_id         = $invoice['payment_intent'];
                    $subscription       = $stripe->subscriptions->retrieve( $subscription_id, [] );
                    $update_payment     = ['metadata' => json_decode(json_encode($subscription->metadata),true)];
                    $stripe->paymentIntents->update( $payment_id, $update_payment );
                    $payment    = $stripe->paymentIntents->retrieve( $payment_id, [] );

                    $order = PaymentDetails::where('subscription_id', $subscription_id)->orderBy('id', 'DESC')->first();

                    if (!@$order) { die(); }

                    // $userID, $packagesID, $totalWebsite, $transactionID, $subscriptionID, $paymentMode, $totalPayment
                    $this->paymentSave($order->user_id, $order->package_id, $payment_id, $subscription_id, 'Stripe', ($payment['metadata']['sale_price']/100));
                }
                break;

            case 'customer.subscription.deleted':
                $subscription   = $request['data']['object'];
                $subscription_id= $subscription['id'];
                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                $order->subscription_status = 0;
                $order->save();
                break;
            
            default:
                // code...
                break;
        }
    }





   


    //paypal payment gateway

    public function paypalCreate( $package, $setting ){
        // dd($setting);
        if( $package->type != 'fixed' ){
    
            $listener = new Paypal();
            // create or get product id from paypal
            $product_fields     = ['name' => $package->name,'type'=> 'DIGITAL'];
            $paypal_product_id  = $listener->Paypal_Create_Product($product_fields,$package->id);
    
            $billing_cycles[]   = [
                                    'frequency' => 
                                        [
                                            'interval_unit' => $package->type=='yearly'? 'YEAR':'MONTH',
                                            'interval_count' => 1
                                        ],
                                    'tenure_type' => "REGULAR",
                                    'sequence'  => 1,
                                    'total_cycles' => 999,
                                    'pricing_scheme' =>
                                        [
                                            'fixed_price' =>
                                                [
                                                    'value' => $package->price,
                                                    'currency_code' => 'USD'
                                                ]
                                        ]
                                    ];
            
            $plan_fields = ['name' => 'Plan for - '. $package->name,
                            'product_id' => $paypal_product_id,
                            'billing_cycles' =>  $billing_cycles,
                            'payment_preferences' => 
                                [
                                    'auto_bill_outstanding' => true,
                                    'payment_failure_threshold' => 1,
                                    'setup_fee_failure_action' => 'CANCEL',
                                    'setup_fee' => 
                                        [
                                            'value' => $package->price,
                                            'currency_code' => 'USD'
                                        ]
                                ]
                            ];
    
            $plan = $listener->Paypal_Create_Plan($plan_fields);
            
            if (!is_array($plan)) {
                $invoice_no         = $this->invoiceNumber();
                $add_date           = "+ 1" . ($package->type=='yearly'? 'YEAR':'MONTH');
                $start_at           = date('Y-m-d', strtotime($add_date)).'T00:00:00Z';
                
                $subscription_fields = ['plan_id'    => $plan,
                                        'start_time' => $start_at,
                                        'subscriber' => [ 'email_address' => Auth::user()->email ],
                                        'custom_id'  => $invoice_no,
                                        'application_context' => 
                                            [
                                                'return_url' => Route('successPaypal') . '?UserID=' . Auth::user()->id . '&package=' . $package->id . '&price=' . $package->price,
                                                'cancel_url' => Route('package') 
                                            ]
                                        ];
    
                $subscription = $listener->Paypal_Create_Subscription($subscription_fields);
                if (@$subscription->message) {
                    return ['status' => 201, 'msg' => 'Server Error'];
                }
    
                if (@$subscription->links) {
                    foreach ($subscription->links as $key => $value) {
                        if ($value->rel == 'approve') {
                            return ['status' => 200, 'url' => $value->href];
                        }
                    }
                } 
            }else{
                return ['status' => 201, 'msg' => 'Payment is not processed Please try another method.'];
            }
        }else{

            $checkout = [
                "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "reference_id" => uniqid() . rand(100, 999),
                        "amount" => [
                            "currency_code" => 'USD',
                            "value" => $package->price,
                        ]
                    ]
                ],
                "transaction_object " => 'payment on credit point',
                "payment_source" => [
                    "paypal" => [
                        "experience_context" => [
                            "payment_method_preference" => "IMMEDIATE_PAYMENT_REQUIRED",
                            "payment_method_selected" => "PAYPAL",
                            "brand_name" => env('APP_NAME'),
                            "locale" => "en-US",
                            "landing_page" => "LOGIN",
                            'auto_bill_outstanding' => true,
                            "user_action" => "PAY_NOW",
                            'return_url' => Route('successPaypal') . '?UserID=' . Auth::user()->id . '&package=' . $package->id,
                            "cancel_url" => Route('packages.buy'),
                        ]
                    ]
                ]
            ];
    
            $listener = new Paypal();
            $result = $listener->Paypal_Create_Order($checkout);
    
            if (@$result->error_description) {
                return ['status' => 201, 'msg' => 'Server Error'];
            }
            if (@$result->links) {
                foreach ($result->links as $key => $value) {
                    if ($value->rel == 'payer-action') {
                        return ['status' => 200, 'url' => $value->href];
                    }
                }
            }
        }
    }

    public function successPaypal(Request $request)
    {
        $Settings = PaymentSettings::latest()->first()->toArray();
        $listener = new Paypal();

        if ( isset($request->subscription_id) && $request->subscription_id ) {
            $transactions = $listener->Paypal_Subscription_Transactions( $request->subscription_id );
            
            if ( @$transactions->transactions[0]->id ) {
                $pay_id             = $transactions->transactions[0]->id;
                $result_details     = $listener->Paypal_Get_Payment_Details($pay_id);
                $price              = $result_details->amount->value;
                $currency           = $result_details->amount->currency_code;

                if( $result_details->id && $result_details->status=='COMPLETED' ){

                    // cancel old subscription
                    $payment = PaymentDetails::latest()
                    ->where('user_id', Auth::id())
                    ->where('subscription_status', 1)
                    ->first();
                    if( isset($payment->id) ){
                        $this->paypalcancel($payment, true);
                    }
                    // end cancel


                    $package = Package::find($request->package);
                    // $userID, $packagesID, $totalWebsite, $transactionID, $subscriptionID, $paymentMode, $totalPayment
                    $this->paymentSave($request->UserID, $package->id, $pay_id, $request->subscription_id, 'Paypal', $package->price);
                    return redirect()->route('package')->with('success', 'Subscription created successfully!');
                }
            }

        }else{
            $result = $listener->Paypal_Capture_Order_Payment(@$_GET['token']);
            if (@$result['payment']->id) {
                $pay_id = $result['payment']->id;
                $package = Package::find($request->package);
                // $userID, $packagesID, $totalWebsite, $transactionID, $subscriptionID, $paymentMode, $totalPayment
                $this->paymentSave($request->UserID, $package->id, $package->limit, $pay_id, '', 'Paypal', $package->price);

                return redirect()->route('package')->with('success', 'Payment has been successfully!');
            }
        }
    }

    public function paypalcancel($payment, $return=false){

        $setting = PaymentSettings::first();
        $listener = new Paypal();
        try {
            if($listener->Paypal_Cancel_Subscription($payment->subscriptionID)){
                if( !$return )
                    return response()->json(['status'=>200, 'msg'=>'Subscription cancelled successfully!']);
            }
        }catch(Exception $e) { 
            dd($e->getMessage(),$payment->subscriptionID);
        }
    }

    public function paypalWebhook(){
        $request    = json_decode(  file_get_contents( 'php://input' ) ,true );
        $event      = isset($request['event_type']) ?: array();
        $resource   = isset($request['resource']) ?: $request['resource'];
        switch ($event) {
            case 'PAYMENT.SALE.COMPLETED':
                if ( isset($resource['billing_agreement_id']) && $resource['billing_agreement_id'] ) {
                    $subscription_id    = $resource['billing_agreement_id'];
                    $payment_id         = $resource['id'];

                    $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                    $package = json_decode($order->payment_detail);
                    if (!@$order) { die(); }
                    // $userID, $packagesID, $totalWebsite, $transactionID, $subscriptionID, $paymentMode, $totalPayment
                    $this->paymentSave($order->user_id, $package['id'], $package['limit'], $payment_id, $subscription_id, 'Paypal', $package['price']);
                }
                break;

            case 'BILLING.SUBSCRIPTION.PAYMENT.FAILED':
                $subscription_id         = $resource['id'];
                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                $order->subscription_status = 0;
                $order->save();
                break;

            case 'BILLING.SUBSCRIPTION.CANCELLED':
                $subscription_id         = $resource['id'];
                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                $order->subscription_status = 0;
                $order->save();
                break;

            case 'BILLING.SUBSCRIPTION.SUSPENDED':
                $subscription_id         = $resource['id'];
                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                $order->subscription_status = 0;
                $order->save();
                break;

            case 'BILLING.SUBSCRIPTION.EXPIRED':
                $subscription_id         = $resource['id'];
                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                $order->subscription_status = 0;
                $order->save();
                break;

            case 'BILLING.SUBSCRIPTION.RE-ACTIVATED':
                $subscription_id         = $resource['id'];
                $order = PaymentDetails::where('subscriptionID', $subscription_id)->orderBy('id', 'DESC')->first();
                $order->subscription_status = 1;
                $order->save();
                break;

            default:
                // code...
                break;
        }
    }


    public function paymentSave($userID, $packagesID, $transactionID, $subscriptionID, $paymentMode, $totalPayment)
    {
        
        $package = Package::find($packagesID)->toArray();
        if ($package['type'] == 'monthly') {
            $day = '30 day';
        } else if ($package['type'] == 'yearly') {
            $day = '365 day';
        }
        $detail = PaymentDetails::where('transactionID', $transactionID)->where('subscriptionID', $subscriptionID)->where('user_id', $userID)->orderBy('id', 'DESC')->first();
        if (isset($detail->id)) {
            PaymentDetails::where('transactionID', $transactionID)
                ->where('subscriptionID', $subscriptionID)
                ->where('user_id', $userID)
                ->update([
                    'user_id'           => $userID,
                    'package_id'        => $packagesID,
                    'invoiceNumber'     => $this->invoiceNumber(),
                    'transactionID'     => $transactionID,
                    'subscriptionID'    => $subscriptionID,
                    'paymentMode'       => $paymentMode,
                    'totalPayment'      => $totalPayment,
                    'transactionTime'   => strtotime(date('Y-m-d H:i:s')),
                    'expiryDate'        => date('d-m-Y h:i:s', strtotime($day)),
                    'payment_detail'    => json_encode($package),
                    'subscription_status' => 1,
                ]);
        } else {
            PaymentDetails::create([
                'user_id'           => $userID,
                'package_id'        => $packagesID,
                'invoiceNumber'     => $this->invoiceNumber(),
                'transactionID'     => $transactionID,
                'subscriptionID'    => $subscriptionID,
                'paymentMode'       => $paymentMode,
                'totalPayment'      => $totalPayment,
                'transactionTime'   => strtotime(date('Y-m-d H:i:s')),
                'expiryDate'        => date('d-m-Y h:i:s', strtotime($day)),
                'payment_detail'    => json_encode($package),
                'subscription_status' => 1,
            ]);
        }
    }
}
