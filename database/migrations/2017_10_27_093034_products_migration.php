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
            $table->text('short_description')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('reserved_quantity')->nullable();
            $table->boolean('is_active')->default(1);
            $table->integer('lang_id')->nullable();
            $table->text('product_status')->nullable();
            $table->text('product_isset')->nullable();
            $table->text('product_garanty')->nullable();
            $table->text('product_stars')->nullable();
            $table->text('product_gift')->nullable();
            $table->integer('timer_current_time')->nullable();
            $table->integer('timer_time')->nullable();
            $table->text('proc')->nullable();
            $table->text('op_memory')->nullable();
            $table->text('hard_memory')->nullable();
            $table->text('op_system')->nullable();
            $table->text('type_memory')->nullable();
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
