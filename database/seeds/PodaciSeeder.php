<?php

use Illuminate\Database\Seeder;

class PodaciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $korisnici = array(
            [
                'name' => 'admin',
                'email' => 'antun.web@gmail.com',
                'password' => bcrypt('admin'),
                'admin' => 'Da',
                'biografija' => '',
                'slika' => '',
                'adresa' => '',
                'mjesto' => '',
                'broj_iskaznice' => '',
                'oib' => '',
                'rodenje' => '',
                'kontakt' => '',
                'facebook' => '',
                'twitter' => '',
                'linkedin' => '',
                'zanimanje' => '',
                'radni_status' => '',
                'vrsta_clana' => '',
                'udruga_clan' => '',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        );
        DB::table('users')->insert($korisnici);
        
        DB::table('stranice')->delete();
        $stranica = array(
            [
                'naziv' => 'onama',
                'tekst' => 'O nama',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        );
        DB::table('stranice')->insert($stranica);
    }
}
