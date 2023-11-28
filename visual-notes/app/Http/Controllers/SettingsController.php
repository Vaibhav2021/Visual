<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\GoogleLoginKey;
use App\Models\SmtpSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PaymentSettingsRequest;
use App\Models\PaymentSettings;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function smtp()
    {
        addVendors(['select', 'smtp']);
        $smtp = SmtpSettings::first();
        return view('settings.smtp', compact('smtp'));
    }

    public function googleauth()
    {
        addVendors(['select', 'smtp']);
        $googleauth = GoogleLoginKey::first();
        return view('settings.googleauth', compact('googleauth'));
    }
    
    public function aws_store(Request $request)
    {
        $rules = [
            'awsAccessKey' => 'required|string',
            'awsSecretKey' => 'required|string',
            'awsDefaultRegion' => 'required|string',
            'from_email' => 'required|email',
            'from_name' => 'required|string',
            'awsdriver' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors(), 'msg' => array_values($validator->errors()->toArray())[0][0]], 422);
        }

        $SMTPDetail = SmtpSettings::first();
        if (empty($SMTPDetail)) {
            $SMTPDetails = new SmtpSettings();
        } else {
            $SMTPDetails = SmtpSettings::find($SMTPDetail->id);
        }
        $SMTPDetails->awsAccessKey = $request->awsAccessKey;
        $SMTPDetails->awsSecretKey = $request->awsSecretKey;
        $SMTPDetails->awsDefaultRegion = $request->awsDefaultRegion;
        $SMTPDetails->awsBucket = $request->awsBucket;
        $SMTPDetails->awsPathStyle = $request->awsPathStyle;
        $SMTPDetails->smtp_from_email = $request->from_email;
        $SMTPDetails->smtp_from_name = $request->from_name;
        $SMTPDetails->driver = $request->awsdriver;
        $SMTPDetails->save();

        Cache::forget('smtp_details');

        $SMTPDetails = SmtpSettings::first();
        Cache::rememberForever('smtp_details', function () use ($SMTPDetails) {
            return $SMTPDetails;
        });
    }

    public function smtp_store(Request $request)
    {
        $rules = [
            'username' => 'required|string',
            'smtp_host' => 'required|string',
            'smtp_port' => 'required|string',
            'smtp_from_email' => 'required|email',
            'smtp_from_name' => 'required|string',
            'smtp_pass' => 'required|string',
            'driver' => 'required|string',
            'encryption' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors(), 'msg' => array_values($validator->errors()->toArray())[0][0]], 422);
        }

        $SMTPDetail = SmtpSettings::first();
        if (empty($SMTPDetail)) {
            $SMTPDetails = new SmtpSettings();
        } else {
            $SMTPDetails = SmtpSettings::find($SMTPDetail->id);
        }
        $SMTPDetails->username = $request->username;
        $SMTPDetails->smtp_host = $request->smtp_host;
        $SMTPDetails->smtp_port = $request->smtp_port;
        $SMTPDetails->smtp_from_email = $request->smtp_from_email;
        $SMTPDetails->smtp_from_name = $request->smtp_from_name;
        $SMTPDetails->smtp_pass = $request->smtp_pass;
        $SMTPDetails->driver = $request->driver;
        $SMTPDetails->encryption = $request->encryption;
        $SMTPDetails->save();

        Cache::forget('smtp_details');
        $SMTPDetails = SmtpSettings::first();
        Cache::rememberForever('smtp_details', function () use ($SMTPDetails) {
            return $SMTPDetails;
        });
    }

    public function googleauth_store(Request $request)
    {
        $rules = [
            'client_id' => 'required|string',
            'client_secret' => 'required|string',
            'redirect' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        try {
            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors(), 'msg' => array_values($validator->errors()->toArray())[0][0]], 422);
            }
    
            $GoogleAuthDetail = GoogleLoginKey::first();
            if (empty($GoogleAuthDetail)) {
                $GoogleAuthDetail = new GoogleLoginKey();
            } else {
                $GoogleAuthDetail = GoogleLoginKey::find($GoogleAuthDetail->id);
            }
            $GoogleAuthDetail->client_id = $request->client_id;
            $GoogleAuthDetail->client_secret = $request->client_secret;
            $GoogleAuthDetail->redirect = $request->redirect;
            if($GoogleAuthDetail->save()){
            return response()->json(['status' => 200, 'message' => 'Updated successfully', 'redirect' => '']);
            }
            else{
                return response()->json(['status' => 200, 'message' => 'Unable to update', 'redirect' => '']);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'message' => $e->getMessage()], 500);
        }
        
    }
    
    public function testEmail(Request $request)
    {
        Mail::to($request->mail)->send(new TestEmail());
    }

    //paymet settings

    function paymentSetting() {
        $payment_settings = PaymentSettings::first();
        return view('settings.paymentsettings',compact('payment_settings'));
    }
    function paymentSettingStore(Request $request) {
        $data = $request->except('_token','setting_id');
       $paymentSettings = PaymentSettings::updateOrCreate(['id'=>$request->setting_id],$data);
       if($paymentSettings){
        return response()->json(['status' => 200, 'message' => 'Payment Settings Updated successfully', 'redirect' => route('settings.payments')]);
       }

    }
}
    