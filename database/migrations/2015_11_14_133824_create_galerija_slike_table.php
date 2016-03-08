<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalerijaSlikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('galerija_slike', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('galerija_id')->unsigned();
            $table->string('slika');
            $table->string('velika_slika');
            $table->Integer('visible')->default('0');
            $table->timestamps();
        });
        
         Schema::table('galerija_slike', function ($table) {
            $table->foreign('galerija_id')->references('id')->on('galerija')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('galerija_slike');
    }
}
