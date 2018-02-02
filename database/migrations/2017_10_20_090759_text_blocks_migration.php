<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TextBlocksMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text_block_name')->nullable();
            $table->integer('text_block_id')->nullable();
            $table->text('title')->nullable();
            $table->text('text')->nullable();
            $table->text('image')->nullable();
            $table->string('language')->nullable();
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
