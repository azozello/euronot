<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Languages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('language_name')->nullable();
            $table->text('language_url')->nullable();
            $table->integer('sort')->nullable();
            $table->text('icon')->nullable();
            $table->boolean('active')->default(0);
            $table->string('name_placeholder',255);
            $table->string('url_placeholder',255);
            $table->string('title_placeholder',255);
            $table->string('description_placeholder',255);
            $table->string('article_placeholder',255);
            $table->string('upload_button_name',255);
            $table->string('updated_at')->nullable();
            $table->string('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
