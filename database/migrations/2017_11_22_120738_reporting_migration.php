<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportingMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporting',function (Blueprint $table){
            $table->increments('id');
            $table->text('year_part')->nullable();
            $table->text('system_type')->nullable();
            $table->integer('with_workers')->nullable();
            $table->integer('without_workers')->nullable();
            $table->integer('workers')->nullable();
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
