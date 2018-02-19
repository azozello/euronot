<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NonStandartPagesText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_standart_pages_text',function (Blueprint $table){
            $table->increments('id');
            $table->integer('non_standart_pages_connection_id')->nullable();
            $table->text('first_lang_text')->nullable();
            $table->text('second_lang_text')->nullable();
            $table->text('third_lang_text')->nullable();
            $table->text('forth_lang_text')->nullable();
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
