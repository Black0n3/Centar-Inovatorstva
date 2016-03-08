<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovostiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('novosti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->string('slika');
            $table->string('velika_slika');
            $table->Text('tekst');
            $table->Integer('user_id')->unsigned();
            $table->Integer('visible')->default('0');
            $table->timestamps();
        });
        
        Schema::table('novosti', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::drop('novosti');
    }
}


