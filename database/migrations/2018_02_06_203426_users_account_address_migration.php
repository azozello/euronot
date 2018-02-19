<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAccountAddressMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_account_address',function (Blueprint $table){
            $table->increments('users_account_address_id');
            $table->integer('users_account_address_users_id')->nullable();
            $table->text('users_account_address_city')->nullable();
            $table->text('users_account_address_street')->nullable();
            $table->text('users_account_address_house')->nullable();
            $table->text('users_account_address_flor')->nullable();
            $table->text('users_account_address_type')->nullable();
            $table->text('users_account_address_number')->nullable();
            $table->text('users_account_address_way')->nullable();
            $table->text('users_account_address_comment')->nullable();
            $table->boolean('users_account_address_is_main')->nullable();
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
