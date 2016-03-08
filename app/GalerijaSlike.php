<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalerijaSlike extends Model
{
    protected $table = 'galerija_slike';
    protected $fillable = [
        'naziv',
        'slika',
        'opis'
    ];
    public function galerija()
  {
    return $this->belongTo('App\Galerija','galerija_id');
  }
}
