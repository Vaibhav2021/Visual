<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PaymentSettings;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    //

    function index() {
        addVendors(['select','razorpay']);
        $packages = Package::get();
        return view('packages.index',compact('packages'));
    } 

    function createForm($package_id = null){
        $packages = null;
        $package_type = getPackageType();
        if(!empty($package_id)){
            $packages = Package::where('id',$package_id)->first();
        }
        $returnHTML = view('packages.form',compact('package_type','packages'))->render();
        return response()->json(['success' => 200,'html' => $returnHTML]);
    }

    function store(Request $request){ 
        $validated = $request->validate([
            'name'=>'required',
            'price' => 'required',
            'type' => 'required',
        ]);
        $validated['created_by'] = auth()->user()->id;
        $validated['updated_by'] = auth()->user()->id;
        $tag = !empty($request->package_id)? 'Updated' : 'Created';
        $package = Package::updateOrCreate(['id' => $request->package_id], $validated);
        if ($package){
            return response()->json(['status' => 200, 'message' => "Package $tag successfully", 'redirect' => route('package')]);
        }
    }

    function paymentMethodForm($package_id) {
        $packages = Package::find($package_id);
        $setting = PaymentSettings::first();
       
        $returnHTML = view('packages.choose-payment-method',compact('packages','setting'))->render();
        return response()->json(['success' => 200,'html' => $returnHTML]);
    }
}
