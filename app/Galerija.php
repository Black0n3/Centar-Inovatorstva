<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galerija extends Model
{
    protected $table = 'galerija';
    protected $fillable = [
        'naziv'
    ];
    public function slike()
  {
    return $this->hasMany('App\GalerijaSlike','galerija_id');
  }
}
