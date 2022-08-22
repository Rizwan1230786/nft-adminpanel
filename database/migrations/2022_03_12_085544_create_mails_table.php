<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('driver')->nullable();
            $table->string('host')->nullable();
            $table->string('port')->nullable();
            $table->string('from')->nullable();
            $table->string('encryption')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('from_address')->nullable();
            $table->string('from_name')->nullable();
            $table->string('sendmail')->nullable();
            $table->string('pretend')->nullable();
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
        Schema::dropIfExists('mails');
    }
}
