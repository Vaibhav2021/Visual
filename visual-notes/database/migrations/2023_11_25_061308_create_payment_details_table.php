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
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            
            $table->string('user_id');
            $table->string('package_id');
            $table->string('invoiceNumber');
            $table->string('transactionID');
            $table->string('subscriptionID');
            $table->string('paymentMode');
            $table->string('totalPayment');
            $table->string('transactionTime');
            $table->string('expiryDate');
            $table->string('payment_detail');
            $table->string('subscription_status');

          

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
