<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clanarina extends Model
{
    protected $table = 'clanarina';
    protected $fillable = [
        'datum_uplate',
        'datum_clanstva',
        'user_id',
    ];
    protected $dates = ['datum_uplate','datum_clanstva'];
  public function clan()
  {
    return $this->belongsTo('App\User','user_id');
  }
}
