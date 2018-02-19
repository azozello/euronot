<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NonStandartPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_standart_pages',function (Blueprint $table){
            $table->increments('id');
            $table->text('non_standart_pages_url')->nullable();
            $table->text('non_standart_pages_title')->nullable();
            $table->text('non_standart_pages_description')->nullable();
            $table->boolean('non_standart_pages_is_active')->nullable();
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
