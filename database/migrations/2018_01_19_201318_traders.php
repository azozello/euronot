<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Traders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('traders_id')->nullable();
            $table->text('traders_name')->nullable();
            $table->text('traders_main_phone_number')->nullable();
            $table->text('traders_second_phone_number')->nullable();
            $table->text('traders_email')->nullable();
            $table->integer('traders_delay')->nullable();
            $table->time('traders_deadline_to_order')->nullable();
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
