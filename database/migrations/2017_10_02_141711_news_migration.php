<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news',function (Blueprint $table){
            $table->increments('id');
            $table->string('name',255)->nullable();
            $table->string('title',255)->nullable();
            $table->integer('page_id');
            $table->integer('page_lang');
            $table->text('text')->nullable();
            $table->string('url',255)->nullable();
            $table->string('description',255)->nullable();
            $table->text('image')->nullable();
            $table->text('tags')->nullable();
            $table->date('date');
            $table->string('updated_at');
            $table->string('created_at');
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
