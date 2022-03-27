<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('book_type')->nullable();
            $table->string('author');
            $table->string('image')->nullable();
            $table->integer('publish_date')->nullable();
            $table->integer('isbn')->nullable();
            $table->integer('issn')->nullable();
            $table->integer('page_count')->nullable();
            $table->string('language')->nullable();
            $table->string('publisher')->nullable();
            $table->integer('price')->nullable();
            $table->text('blurb')->nullable();
            $table->string('reading_state');
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
        Schema::dropIfExists('books');
    }
}
