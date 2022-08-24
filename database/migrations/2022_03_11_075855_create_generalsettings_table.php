<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalsettings', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo')->nullable();
            $table->string('favicon_image')->nullable();
            $table->string('website_logo')->nullable();
            $table->string('header_bg_img')->nullable();
            $table->string('footer_bg_img')->nullable();
            $table->string('application_title')->nullable();
            $table->string('address')->nullable();
            $table->string('email_address')->nullable();
            $table->string('contact')->nullable();
            $table->string('footer_detail')->nullable();
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
        Schema::dropIfExists('generalsettings');
    }
}
