<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->text('address');        
            $table->char('cp', 10);
            $table->string('city', 60);
            $table->string('name', 100)->nullable();
            $table->string('building', 60)->nullable();
            $table->integer('floor')->nullable();
            $table->string('letterbox', 10)->nullable();
            $table->text('location')->nullable();
            $table->string('type', 150);
            $table->float('area');
            $table->integer('rooms');
            $table->text('description')->nullable();
            $table->float('price')->nullable();
            $table->string('furniture', 125)->nullable();
            $table->string('energy_class', 125)->nullable();
            $table->string('ges', 125)->nullable();
            $table->tinyInteger('state')->default(0);
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
