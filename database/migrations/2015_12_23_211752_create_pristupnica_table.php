<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePristupnicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pristupnica', function (Blueprint $table) {
             $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('adresa');
            $table->string('mjesto');
            $table->string('oib');
            $table->date('rodenje');
            $table->string('kontakt');
            $table->string('zanimanje');
            $table->string('radni_status');
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
        Schema::drop('pristupnica');
    }
}
