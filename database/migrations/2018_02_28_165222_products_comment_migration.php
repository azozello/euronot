<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsCommentMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_comment', function (Blueprint $table) {
            $table->increments('product_comment_id');
            $table->integer('product_id_connection')->nullable();
            $table->text('comment')->nullable();
            $table->text('comment_name')->nullable();
            $table->text('comment_email')->nullable();
            $table->time('comment_time')->nullable();
            $table->date('comment_date');
            $table->boolean('is_active')->nullable();
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
