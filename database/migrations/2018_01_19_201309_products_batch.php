<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsBatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_batch', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batch_products_id')->nullable();
            $table->integer('batch_number')->nullable();
            $table->double('batch_price')->nullable();
            $table->integer('batch_quantity')->nullable();
            $table->double('batch_sum')->nullable();
            $table->integer('batch_order_number')->nullable();
            $table->date('batch_date')->nullable();
            $table->time('batch_time')->nullable();
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
