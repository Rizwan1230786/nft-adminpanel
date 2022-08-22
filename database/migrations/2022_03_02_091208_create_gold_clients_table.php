<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoldClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gold_clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('contact')->nullable();
            $table->string('order_date')->nullable();
            $table->string('no_of_orders')->nullable();
            $table->string('orders_payment')->nullable();
            $table->string('city')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable()->default('0');
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
        Schema::dropIfExists('gold_clients');
    }
}
