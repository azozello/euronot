<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('article')->nullable();
            $table->integer('product_id')->nullable();
            $table->text('url');
            $table->string('images_id',255)->nullable();
            $table->double('price')->nullable();
            $table->text('text')->nullable();
            $table->text('attributes_id')->nullable();
            $table->text('name')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('reserved_quantity')->nullable();
            $table->integer('arriving_quantity')->nullable();
            $table->integer('booked_quantity')->default(0);
            $table->boolean('is_active')->default(1);
            $table->integer('lang_id')->nullable();
            $table->text('product_type')->nullable();
            $table->text('product_provider')->nullable();
            $table->text('product_delay_in_delivery')->nullable();
            $table->text('product_deadline_to_arrive')->nullable();
            $table->text('product_optimal_quantity')->nullable();
            $table->text('product_availability')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
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
