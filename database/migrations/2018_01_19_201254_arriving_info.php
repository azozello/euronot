<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArrivingInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arriving_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('arriving_info_order_number')->nullable();
            $table->text('arriving_info_order_condition')->nullable();
            $table->integer('arriving_info_number')->nullable();
            $table->date('arriving_info_order_date')->nullable();
            $table->text('arriving_info_user_name')->nullable();
            $table->double('arriving_info_sum')->nullable();
            $table->text('arriving_info_address')->nullable();
            $table->date('arriving_info_preferred_date')->nullable();
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
