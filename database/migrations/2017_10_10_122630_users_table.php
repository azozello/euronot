<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voi
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->default('Не указано');
            $table->string('second_name', 255)->default('Не указано');
            $table->string('patronymic', 255)->default('Не указано');
            $table->string('email', 190)->unique()->nullable();
            $table->string('password', 255)->nullable();;
            $table->string('main_phone_number',255)->default('Не указано');
            $table->string('second_phone_number',255)->default('Не указано');
            $table->string('comment',255)->nullable();
            $table->smallInteger('discount')->default(0);
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