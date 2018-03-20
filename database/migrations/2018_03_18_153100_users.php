<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->text('user_type')->nullable();
            $table->text('name')->nullable();
            $table->text('second_name')->nullable();
            $table->text('patronymic')->nullable();
            $table->string('email',190)->unique();
            $table->text('password')->nullable();
            $table->text('comment')->nullable();
            $table->smallInteger('discount')->default(0);
            $table->boolean('is_firm')->nullable();
            $table->text('firm_name')->nullable();
            $table->text('edrpou_code')->nullable();
            $table->boolean('is_nds')->nullable();
            $table->text('nds_code')->nullable();
            $table->boolean('is_safety')->default(false);
            $table->boolean('verified')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->string('token')->default(0);
            $table->rememberToken();
            $table->timestamps();
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
