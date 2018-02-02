<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SellerProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seller_products_id')->nullable();
            $table->integer('seller_products_order_number')->nullable();
            $table->text('seller_products_article')->nullable();
            $table->text('seller_products_name')->nullable();
            $table->double('seller_products_price')->nullable();
            $table->integer('seller_products_quantity')->nullable();
            $table->double('seller_products_sum')->nullable();
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
