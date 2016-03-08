<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('admin', 2);
            $table->text('biografija');
            $table->string('slika');
            $table->string('adresa');
            $table->string('mjesto');
            $table->string('broj_iskaznice');
            $table->string('oib');
            $table->date('rodenje');
            $table->string('kontakt');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('zanimanje');
            $table->string('radni_status');
            $table->string('vrsta_clana');
            $table->string('udruga_clan', 2);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
