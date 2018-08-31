<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePublishers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fantasy_name');
            $table->string('cnpj', 25);
            $table->string('postal_code', 20)->nullable();
            $table->string('address', 60)->nullable();
            $table->string('number', 5)->nullable();
            $table->string('neighborhood', 60)->nullable();
            $table->string('city', 60)->nullable();
            $table->string('state', 2)->nullable();
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
        Schema::dropIfExists('publishers');
    }
}
