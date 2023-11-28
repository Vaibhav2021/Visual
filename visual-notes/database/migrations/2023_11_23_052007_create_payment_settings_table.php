<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_settings', function (Blueprint $table) {
            $table->id();
            
            $table->string('stripe_payment_gateway')->nullable();
            $table->string('razorpay_payment_gateway')->nullable();
            $table->string('paypal_payment_gateway')->nullable();
            $table->string('paypal_client_id')->nullable();
            $table->string('paypal_client_secrete')->nullable();
            $table->string('paypal_webhook')->nullable();
            $table->string('razorpay_client_id')->nullable();
            $table->string('razorpay_client_secrete')->nullable();
            $table->string('razorpay_webhook')->nullable();
            $table->string('stripe_client_id')->nullable();
            $table->string('stripe_client_secrete')->nullable();
            $table->string('stripe_webhook')->nullable();
            $table->string('paypal_payment_type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_settings');
    }
};
