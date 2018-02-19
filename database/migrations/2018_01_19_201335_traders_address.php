<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TradersAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traders_address',function (Blueprint $table){
            $table->increments('traders_address_number');
            $table->integer('traders_address_id')->nullable();
            $table->text('traders_address_city')->nullable();
            $table->text('traders_address_street')->nullable();
            $table->text('traders_address_house')->nullable();
            $table->text('traders_address_flor')->nullable();
            $table->text('traders_address_type')->nullable();
            $table->text('traders_address_room_number')->nullable();
            $table->text('traders_address_way')->nullable();
            $table->text('traders_address_comment')->nullable();
            $table->boolean('traders_address_is_main')->nullable();
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
