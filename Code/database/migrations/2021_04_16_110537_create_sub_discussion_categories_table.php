<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubDiscussionCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_discussion_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('discussion_categories_id');
            $table->foreign('discussion_categories_id')->references('id')->on('discussion_categories')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('sub_discussion_categories');
    }
}
