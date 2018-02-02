<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ObjectMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('title')->nullable();
            $table->integer('object_id');
            $table->integer('page_lang')->nullable();
            $table->text('text')->nullable();
            $table->string('url',255)->nullable();
            $table->string('description',190)->nullable();
            $table->text('image')->nullable();
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
