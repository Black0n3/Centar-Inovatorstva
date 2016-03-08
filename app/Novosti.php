<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novosti extends Model
{
    protected $table = 'novosti';
    protected $fillable = [
        'naziv',
        'tekst',
        'slika',
        'velika_slika'
    ];
  public function author()
  {
    return $this->belongsTo('App\User','user_id');
  }
}


