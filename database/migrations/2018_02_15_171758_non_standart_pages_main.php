<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NonStandartPagesMain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_standart_pages_main',function (Blueprint $table){
            $table->increments('id');
            $table->integer('non_standart_page_id')->nullable();
            $table->integer('non_standart_page_lang_id')->nullable();
            $table->text('non_standart_page_url')->nullable();
            $table->text('non_standart_page_title')->nullable();
            $table->text('non_standart_page_description')->nullable();
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
