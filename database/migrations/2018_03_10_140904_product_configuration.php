<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductConfiguration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_configuration', function (Blueprint $table) {
            $table->increments('product_configuration_id');
            $table->integer('product_id_connection')->nullable();
            $table->text('configuration')->nullable();
            $table->text('configuration_price')->nullable();
            $table->text('configuration_type')->nullable();
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
