<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactsFacesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_faces',function (Blueprint $table){
            $table->increments('contacts_faces_id');
            $table->integer('contacts_faces_users_id')->nullable();
            $table->text('contacts_faces_name')->nullable();
            $table->text('contacts_faces_position')->nullable();
            $table->text('contacts_faces_comment')->nullable();
            $table->boolean('contacts_faces_is_main')->nullable();
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
