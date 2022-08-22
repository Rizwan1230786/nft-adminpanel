<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('seller_id')->nullable()->unique();
            $table->string('secret_key')->nullable();
            $table->string('fullname')->nullable();
            $table->string('displayname')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->string('phoneno')->nullable();
            $table->string('dob')->nullable();
            $table->string('account_type')->nullable('seller');
            $table->string('google_id')->nullable();
            $table->string('apple_id')->nullable();
            $table->string('status')->default('1');
            $table->string('is_verified')->nullable();
            $table->string('stripe_link')->nullable();
            $table->string('stripe_account_id')->nullable();
            $table->string('stripe_status')->default('0');
            $table->string('is_deleted')->nullable();
            $table->string('OTP')->nullable();
            $table->string('OTP_expire_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
