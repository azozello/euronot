<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductAtributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attributes_parent_filter')->nullable();
            $table->text('attributes_text')->nullable();
            $table->text('attributes_name')->nullable();
            $table->text('attributes_url');
            $table->integer('attributes_filter_id')->nullable();
            $table->integer('attributes_id')->nullable();
            $table->integer('attributes_lang_id')->nullable();
            $table->text('attributes_title')->nullable();
            $table->text('attributes_description')->nullable();
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
