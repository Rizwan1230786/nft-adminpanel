<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('detail')->nullable();
            $table->string('price')->nullable();
            $table->string('royality')->nullable();
            $table->string('size')->nullable();
            $table->string('no_of_copies')->nullable();
            $table->string('put_on_sale')->nullable();
            $table->string('sale_prize')->nullable();
            $table->string('unlock_purchased')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('items');
    }
}
