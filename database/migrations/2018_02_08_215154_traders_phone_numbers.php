<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TradersPhoneNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traders_phone_numbers',function (Blueprint $table){
            $table->increments('traders_phone_id');
            $table->integer('traders_phone_traders_id');
            $table->text('traders_phone_number')->nullable();
            $table->text('traders_phone_comment')->nullable();
            $table->boolean('traders_phone_is_main')->nullable();
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
