<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FiltersTextMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters_text', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->nullable();
            $table->integer('filter_id')->nullable();
            $table->text('text')->nullable();
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
