<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StreetsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streets',function (Blueprint $table){
            $table->increments('id');
            $table->integer('city_id');
            $table->text('street_uk_name')->nullable();
            $table->text('street_en_name')->nullable();
            $table->text('houses_numbers')->nullable();
            $table->text('houses_index')->nullable();
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
