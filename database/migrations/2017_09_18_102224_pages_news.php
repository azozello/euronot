<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PagesNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_news',function (Blueprint $table){
            $table->increments('id');
            $table->text('page_name')->nullable();
            $table->text('page_title')->nullable();
            $table->integer('page_id');
            $table->integer('parent_page_id')->nullable();
            $table->integer('page_lang')->nullable();
            $table->longText('page_text')->nullable();
            $table->text('page_url')->nullable();
            $table->text('page_description')->nullable();
            $table->text('page_meta_title')->nullable();
            $table->text('page_type')->nullable();
            $table->boolean('is_active')->default(0);
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
