<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjektiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projekti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->string('slika');
            $table->string('velika_slika');
            $table->integer('voditelj_id')->unsigned();
            $table->integer('mentor_id')->unsigned();
            $table->text('tekst');
            $table->Integer('visible')->default('0');
            $table->timestamps();
        });
        
         Schema::table('projekti', function ($table) {
            $table->foreign('voditelj_id')->references('id')->on('users');
            $table->foreign('mentor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projekti');
    }
}
