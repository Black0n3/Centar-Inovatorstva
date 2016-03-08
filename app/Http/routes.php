<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// logiranje
Route::get('profil/login', 'Auth\AuthController@getLogin');
Route::post('profil/login', 'Auth\AuthController@postLogin');
Route::get('profil/logout', 'Auth\AuthController@getLogout');
Route::get('profil', 'StraniceController@profil');
Route::post('profil', 'StraniceController@update_profil');
Route::put('profil', 'StraniceController@update_profil');
Route::patch('profil', 'StraniceController@update_profil');
Route::get('profil/slika', 'StraniceController@slika');
Route::post('profil/slika', 'StraniceController@slikaspremi');
Route::get('profil/lozinka', 'StraniceController@profil_lozinka');
Route::post('profil/lozinka', 'StraniceController@profil_lozinka_spremi');
Route::put('profil/lozinka', 'StraniceController@profil_lozinka_spremi');
Route::patch('profil/lozinka', 'StraniceController@profil_lozinka_spremi');

Route::get('profil/projekti', 'StraniceController@profilProjekti');
Route::get('profil/clanarina', 'StraniceController@profilClanarina');
Route::get('kolacici', 'StraniceController@privacypolicy');


Route::get('profil/{id}/{name}', 'StraniceController@profilJavni');

// Registration routes...
Route::get('profil/register', 'Auth\AuthController@getRegister');
Route::post('profil/register', 'Auth\AuthController@postRegister');

// Novosti
Route::get('/', 'StraniceController@novosti');
Route::get('novosti', 'StraniceController@novosti');
Route::get('novosti/{id}/{naziv}', 'StraniceController@novostPrikaz');

// Projekti
Route::get('projekti', 'StraniceController@projekti');
Route::get('projekti/{id}/{naziv}', 'StraniceController@projektPrikaz');

// Galerija
Route::get('galerija', 'StraniceController@galerija');
Route::get('galerija/{id}/{naziv}', 'StraniceController@galerijaPrikaz');

// Pristupnica
Route::get('pristupnica', 'StraniceController@pristupnica');
Route::post('pristupnica', 'PristupnicaController@store');

// Kontakt i O nama
Route::get('kontakt', 'StraniceController@kontakt');
Route::post('kontakt', 'StraniceController@posaljiemail');
Route::put('Kontakt', 'StraniceController@posaljiemail');
Route::patch('kontakt', 'StraniceController@posaljiemail');
Route::get('onama', 'StraniceController@onama');

// profil
Route::get('profile', [
    'middleware' => 'auth',
    'uses' => 'StraniceController@show'
]);

////////////////
// Dashboard  //
////////////////
// dashboard
Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function () {
    
    Route::get('dashboard', 'StraniceController@dashboard');
    // novosti
    Route::resource('dashboard/novosti', 'DBNovostiController');
    Route::get('dashboard/novosti/{id}/delete', 'DBNovostiController@destroy');
    Route::get('dashboard/novosti/{id}/slika', 'DBNovostiController@slika');
    Route::post('dashboard/novosti/{id}/slikaspremi', 'DBNovostiController@slikaspremi');
    
    // projekti
    Route::resource('dashboard/projekti', 'DBProjektiController');
    Route::get('dashboard/projekti/{id}/delete', 'DBProjektiController@destroy');
    Route::get('dashboard/projekti/{id}/slika', 'DBProjektiController@slika');
    Route::post('dashboard/projekti/{id}/slikaspremi', 'DBProjektiController@slikaspremi');
    
    // galerija
    Route::post('dashboard/galerija/{id}/dodajsliku', 'DBGalerijaController@storeSliku');
    Route::resource('dashboard/galerija', 'DBGalerijaController');
    Route::get('dashboard/galerija/{id}/delete', 'DBGalerijaController@destroy');
    Route::get('dashboard/galerija/{id}/dodajsliku', 'DBGalerijaController@createSliku');
    
    // galerija slike
    Route::resource('dashboard/slike', 'DBGalerijaSlikeController');
    Route::get('dashboard/slike/{id}/delete', 'DBGalerijaSlikeController@destroy');
    Route::get('dashboard/slike/{id}/slika', 'DBGalerijaSlikeController@slika');
    Route::post('dashboard/slike/{id}/slikaspremi', 'DBGalerijaSlikeController@slikaspremi');
    // korisnici
    Route::resource('dashboard/clanovi', 'DBClanoviController');
    Route::get('dashboard/clanovi/{id}/delete', 'DBClanoviController@destroy');
    Route::get('dashboard/clanovi/{id}/slika', 'DBClanoviController@slika');
    Route::post('dashboard/clanovi/{id}/slikaspremi', 'DBClanoviController@slikaspremi');
    Route::get('dashboard/clanovi/{id}/lozinka', 'DBClanoviController@profil_lozinka');
    Route::post('dashboard/clanovi/{id}/lozinka', 'DBClanoviController@profil_lozinka_spremi');
    Route::put('dashboard/clanovi/{id}/lozinka', 'DBClanoviController@profil_lozinka_spremi');
    Route::patch('dashboard/clanovi/{id}/lozinka', 'DBClanoviController@profil_lozinka_spremi');
    
    // clanarine
    Route::resource('dashboard/clanarine', 'DBClanarineController');
    Route::get('dashboard/clanarine/{id}/delete', 'DBClanarineController@destroy');
    
     // Pristupnica
     Route::get('dashboard/podaci/broj', 'DBPristupnicaController@broj');
    Route::resource('dashboard/pristupnica', 'DBPristupnicaController');
    Route::get('dashboard/pristupnica/{id}/delete', 'DBPristupnicaController@destroy');
    
    // stranice
    Route::resource('dashboard/stranice', 'DBStraniceController');
    

    
});


