<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    addVendors(['auth']);
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/home', function () {
        return view('index');
    })->name('home');

    Route::get('/my-notes', function () {
        return view('my-notes');
    })->name('my-notes');


    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::get('settings/smtp', [SettingsController::class, 'smtp'])->name('settings.smtp');
    Route::post('settings/aws', [SettingsController::class, 'aws_store'])->name('settings.aws');
    Route::post('settings/smtp', [SettingsController::class, 'smtp_store'])->name('settings.smtp.store');
    Route::get('settings/roles-permission', [RolesController::class, 'index'])->name('settings.roles');
    Route::get('settings/google-auth', [SettingsController::class, 'googleauth'])->name('settings.google-auth');
    Route::post('settings/google-auth', [SettingsController::class, 'googleauth_store'])->name('settings.google-auth.store');
    Route::get('settings/roles-permission/members/add/{id?}', [RolesController::class, 'add_member'])->name('settings.roles.add_member');
    Route::post('settings/roles-permission/members/add', [RolesController::class, 'store_member'])->name('settings.roles.store_member');
    Route::get('settings/roles-permission/create/{id?}', [RolesController::class, 'create'])->name('settings.roles.create');
    Route::post('settings/roles-permission/save/{id?}', [RolesController::class, 'store'])->name('settings.roles.store');
    Route::post('settings/test-email', [SettingsController::class, 'testEmail'])->name('settings.test-email')->middleware('mail');
    //payment settings route
    Route::get('settings/payment', [SettingsController::class, 'paymentSetting'])->name('settings.payments');
    Route::post('settings/payment', [SettingsController::class, 'paymentSettingStore'])->name('settings.payment.save');

    Route::post('razorpay-webhook', [CheckoutController::class, 'razorpayWebhook'])->name('razorpayWebhook');
    Route::post('stripe-webhook', [CheckoutController::class, 'stripeWebhook'])->name('stripe.webhook');
    Route::post('paypal-webhook', [CheckoutController::class, 'paypalWebhook'])->name('paypal.webhook');
    Route::any('stripe-success', [CheckoutController::class, 'stripeSuccess'])->name('stripeSuccess');

    Route::any('paypal-success', [CheckoutController::class, 'successPaypal'])->name('successPaypal');


    //package routes package
    Route::prefix('packages')->group(function(){
    Route::get('/', [PackageController::class, 'index'])->name('package');
    Route::get('create/{id?}', [PackageController::class, 'createForm'])->name('package.create.form');
    Route::post('store', [PackageController::class, 'store'])->name('package.store');
    Route::get('payment/method/{id}', [PackageController::class, 'paymentMethodForm'])->name('package.payment.method');
    });

    //checkout routes
    Route::post('checkout', [CheckoutController::class, 'checkout'])->name('packages.checkout');



    Route::prefix('master')->group(function () {
        Route::get('/', [MasterController::class, 'index'])->name('master.index');
    });
    

    //Tags routes package
    Route::prefix('tags')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('tag');
        Route::get('/create/{id?}',[TagController::class,'createForm'])->name('tags.create.form');
        Route::post('/store',[TagController::class,'store'])->name('tag.store');
        Route::get('/destroy/{id?}',[TagController::class,'destroy'])->name('tag.delete');
    });




    



});

require __DIR__.'/auth.php';
