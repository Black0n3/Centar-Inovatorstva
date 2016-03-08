<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClanarinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clanarina', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id')->unsigned();
            $table->date('datum_uplate');
            $table->date('datum_clanstva');
            $table->timestamps();
        });
        
        Schema::table('clanarina', function ($table) {
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
        Schema::drop('clanarina');
    }
}
