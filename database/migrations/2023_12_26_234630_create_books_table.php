<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_code');
            $table->string('title');
            $table->integer('pages');
            $table->string('sipnosis',500);
            $table->string('author');
            $table->year('publish_year');
            $table->string('status');
            $table->string('cover_img');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}