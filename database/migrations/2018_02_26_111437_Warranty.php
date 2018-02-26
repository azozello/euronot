<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Warranty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('warranty_lang')->nullable();
            $table->longText('warranty_text')->nullable();
            $table->text('warranty_name')->nullable();
            $table->text('warranty_url')->nullable();
            $table->text('warranty_description')->nullable();
            $table->text('warranty_title')->nullable();
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
