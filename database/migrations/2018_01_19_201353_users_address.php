<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_address_id')->nullable();
            $table->text('users_city')->nullable();
            $table->text('users_address')->nullable();
            $table->text('users_flat')->nullable();
            $table->boolean('users_address_is_main')->nullable();
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
