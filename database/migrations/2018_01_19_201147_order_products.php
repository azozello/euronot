<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products',function (Blueprint $table){
            $table->increments('id');
            $table->integer('order_products_id');
            $table->integer('products_order_number');
            $table->text('products_article')->nullable();
            $table->text('products_name')->nullable();
            $table->double('products_price')->nullable();
            $table->integer('products_quantity')->nullable();
            $table->double('products_price_with_quantity')->nullable();
            $table->integer('products_seller_order_number')->nullable();
            $table->integer('products_seller_first_order_number')->nullable();
            $table->text('products_order_condition')->nullable();
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
