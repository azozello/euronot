<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FiltersMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_view')->default(1);
            $table->integer('parent_filter')->nullable();
            $table->text('text')->nullable();
            $table->text('name')->nullable();
            $table->text('url');
            $table->integer('filter_id')->nullable();
            $table->integer('lang_id')->nullable();
            $table->string('type')->nullable();
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
