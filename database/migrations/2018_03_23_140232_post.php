<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('comment')->nullable();
            $table->text('status');
            $table->date('date');
            $table->text('name');
            $table->integer('sum');
            $table->string('type');
            $table->integer('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('gift')->nullable();
            $table->string('address');
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
