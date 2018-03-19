<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainPageMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_page', function (Blueprint $table) {
            $table->increments('id');
            $table->text('img_0')->nullable();
            $table->text('img_1')->nullable();
            $table->text('img_2')->nullable();
            $table->text('img_3')->nullable();
            $table->text('img_4')->nullable();
            $table->text('img_5')->nullable();
            $table->text('img_url_0')->nullable();
            $table->text('img_url_1')->nullable();
            $table->text('img_url_2')->nullable();
            $table->text('img_url_3')->nullable();
            $table->text('img_url_4')->nullable();
            $table->text('img_url_5')->nullable();
            $table->text('text_block_0')->nullable();
            $table->text('text_block_1')->nullable();
            $table->text('text_block_2')->nullable();
            $table->text('text_block_3')->nullable();
            $table->text('text_block_4')->nullable();
            $table->text('text_block_5')->nullable();
            $table->text('text_block_6')->nullable();
            $table->text('text_block_7')->nullable();
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
