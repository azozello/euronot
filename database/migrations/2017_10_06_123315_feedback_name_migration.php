<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeedbackNameMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name_form')->nullable();
            $table->text('second_name_form')->nullable();
            $table->text('phone_form')->nullable();
            $table->text('email_form')->nullable();
            $table->text('comment_form')->nullable();
            $table->text('title')->nullable();
            $table->mediumText('text')->nullable();
            $table->text('email')->nullable();
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
