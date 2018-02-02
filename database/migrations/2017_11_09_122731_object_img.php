<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ObjectImg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_images', function (Blueprint $table) {
            $table->increments('id');
            $table->text('images_name')->nullable();
            $table->integer('object_id');
            $table->text('image')->nullable();
            $table->text('images_text')->nullable();
            $table->text('images_title')->nullable();
            $table->string('images_url',255)->nullable();
            $table->string('images_description',190)->nullable();
            $table->string('updated_at');
            $table->string('created_at');
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
