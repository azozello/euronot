<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TradersContactsFaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traders_contacts_faces',function (Blueprint $table){
            $table->increments('traders_contacts_faces_id');
            $table->integer('traders_contacts_faces_users_id')->nullable();
            $table->text('traders_contacts_faces_name')->nullable();
            $table->text('traders_contacts_faces_position')->nullable();
            $table->text('traders_contacts_faces_comment')->nullable();
            $table->boolean('traders_contacts_faces_is_main')->nullable();
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
