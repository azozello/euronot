<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Traders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traders', function (Blueprint $table) {
            $table->increments('traders_id');
            $table->text('traders_first_name')->nullable();
            $table->text('traders_second_name')->nullable();
            $table->text('traders_patronymic')->nullable();
            $table->text('traders_type')->nullable();
            $table->text('traders_is_firm')->nullable();
            $table->text('traders_firm_name')->nullable();
            $table->text('traders_edrpou_code')->nullable();
            $table->text('traders_is_nds')->nullable();
            $table->text('traders_nds_code')->nullable();
            $table->text('traders_email')->nullable();
            $table->integer('traders_delay')->nullable();
            $table->time('traders_deadline_to_order')->nullable();
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
