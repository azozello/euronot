<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('text')->nullable();
            $table->integer('parent_category_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->text('products_id')->nullable();
            $table->text('url');
            $table->boolean('is_active')->default(1);
            $table->integer('lang_id')->nullable();
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
