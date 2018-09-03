<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('code');
            $table->string('image');
            $table->string('title');
            $table->string('description');
            $table->integer('author_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('publishing_company_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->integer('format_id')->unsigned();
            $table->date('publication_date');
            $table->string('notice')->nullable();
            $table->integer('category');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('publishing_company_id')->references('id')->on('publishers');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('format_id')->references('id')->on('formats');
            $table->timestamps();
            $table->softDeletes();
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
