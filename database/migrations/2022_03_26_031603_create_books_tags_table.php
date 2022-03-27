<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_tags', function (Blueprint $table) {
            $table->unsignedInteger('book_id')->index();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->unsignedInteger('tag_id')->index();
            $table->foreign('tag_id')->references('tag')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_tags');
    }
}
