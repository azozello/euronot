<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AboutCompanyMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_company',function (Blueprint $table){
            $table->increments('id');
            $table->integer('about_company_lang')->nullable();
            $table->longText('about_company_text')->nullable();
            $table->text('about_company_name')->nullable();
            $table->text('about_company_url')->nullable();
            $table->text('about_company_description')->nullable();
            $table->text('about_company_title')->nullable();
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
