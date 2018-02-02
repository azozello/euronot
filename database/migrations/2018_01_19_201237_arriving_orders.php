<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArrivingOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arriving_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('arriving_condition')->nullable();
            $table->integer('arriving_order_number')->nullable();
            $table->integer('arriving_number')->nullable();
            $table->date('arriving_plan_date')->nullable();
            $table->date('arriving_date')->nullable();
            $table->time('arriving_time')->nullable();
            $table->text('arriving_type')->nullable();
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
