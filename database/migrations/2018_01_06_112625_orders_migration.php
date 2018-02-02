<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders',function (Blueprint $table){
            $table->increments('id');
            $table->integer('order_number');
            $table->integer('user_id');
            $table->text('user_name')->nullable();
            $table->text('user_phone_number')->nullable();
            $table->text('payment_type')->nullable();
            $table->text('transportation_type')->nullable();
            $table->text('transportation_address')->nullable();
            $table->date('preferred_transportation_date')->nullable();
            $table->text('transportation_number')->nullable();
            $table->date('transportation_date')->nullable();
            $table->integer('overdue_order')->default(0);
//            $table->text('trader')->nullable();
//            $table->text('product_order_id')->nullable();
//            $table->integer('product_order_quantity')->nullable();
//            $table->float('product_order_price')->nullable();
//            $table->float('price_with_quantity')->nullable();
            $table->float('selling_sum')->nullable();
            $table->float('buying_sum')->nullable();
            $table->text('condition')->nullable();
            $table->date('creating_order_date');
            $table->time('creating_order_time');
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
