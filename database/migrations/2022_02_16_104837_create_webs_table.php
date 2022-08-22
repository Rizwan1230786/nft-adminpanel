<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webs', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->string('url_slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('head_title')->nullable();
            $table->string('page_priority')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('page_content')->nullable();
            $table->string('page_rank')->nullable();
            $table->string('is_publish')->nullable()->default('0');
            $table->string('short_desc')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('webs');
    }
}
