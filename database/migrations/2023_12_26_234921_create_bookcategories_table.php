<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('book_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_categories');
    }
}