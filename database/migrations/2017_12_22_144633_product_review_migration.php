<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductReviewMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_review', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('review_product_id')->nullable();
            $table->integer('review_id')->nullable();
            $table->integer('review_parent_id')->nullable();
            $table->text('reviewer_name')->nullable();
            $table->text('reviewer_email')->nullable();
            $table->longText('reviewer_text')->nullable();
            $table->integer('review_mark')->nullable();
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
