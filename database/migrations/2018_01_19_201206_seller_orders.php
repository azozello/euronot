<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SellerOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('seller_order_condition')->nullable();
            $table->integer('seller_order_number')->nullable();
            $table->time('seller_creating_order_time')->nullable();
            $table->date('seller_creating_order_date')->nullable();
            $table->text('seller_supplier_name')->nullable();
            $table->double('seller_order_sum')->nullable();
            $table->date('seller_expected_date_order')->nullable();
            $table->boolean('seller_overdue_order')->default(1);
            $table->time('seller_order_coming_time')->nullable();
            $table->date('seller_order_coming_date')->nullable();
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
