<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactsFacesForPhonesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_faces_for_phones',function (Blueprint $table){
            $table->increments('id');
            $table->integer('contacts_faces_phones_id')->nullable();
            $table->text('contacts_faces_for_phones_name')->nullable();
            $table->boolean('contacts_faces_for_phones_is_main')->nullable();
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
