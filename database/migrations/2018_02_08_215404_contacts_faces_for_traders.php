<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactsFacesForTraders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_faces_for_traders',function (Blueprint $table){
            $table->increments('id');
            $table->integer('contact_faces_for_traders_id')->nullable();
            $table->text('contact_faces_for_traders_name')->nullable();
            $table->boolean('contact_faces_for_traders_is_main')->nullable();
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
