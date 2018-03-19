<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Analitics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics',function (Blueprint $table){
            $table->increments('id');
            $table->text('analytics_text_1')->nullable();
            $table->text('analytics_text_2')->nullable();
            $table->text('analytics_text_3')->nullable();
            $table->text('analytics_text_4')->nullable();
            $table->text('analytics_text_5')->nullable();
            $table->text('analytics_text_6')->nullable();
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
