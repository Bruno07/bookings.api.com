<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAuthors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40);
            $table->string('last_name', 60);
            $table->date('birth');
            $table->string('postal_code', 20)->nullable();
            $table->string('address', 60)->nullable();
            $table->string('number', 5)->nullable();
            $table->string('neighborhood', 60)->nullable();
            $table->string('city', 60)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('email', 120);
            $table->string('web_site')->nullable();
            $table->string('phone', 20)->nullable();
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
        Schema::dropIfExists('authors');
    }
}
