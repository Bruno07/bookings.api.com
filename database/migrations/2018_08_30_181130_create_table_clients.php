<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40);
            $table->string('last_name', 60);
            $table->date('birth')->nullable();
            $table->string('identity', 20)->unique()->nullable();
            $table->string('social_security', 20)->unique()->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('address', 60)->nullable();
            $table->string('number', 5)->nullable();
            $table->string('neighborhood', 60)->nullable();
            $table->string('city', 60)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('cell_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
