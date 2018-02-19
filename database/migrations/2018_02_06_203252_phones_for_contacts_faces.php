<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhonesForContactsFaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones_for_contacts_faces',function (Blueprint $table){
            $table->increments('id');
            $table->integer('phones_for_contacts_contacts_id')->nullable();
            $table->text('phones_for_contacts_faces_phone_number')->nullable();
            $table->text('phones_for_contacts_faces_comment')->nullable();
            $table->boolean('phones_for_contacts_faces_is_main')->nullable();
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
