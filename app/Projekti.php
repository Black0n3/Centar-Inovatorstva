<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projekti extends Model
{
    protected $table = 'projekti';
    protected $fillable = [
        'naziv',
        'slika',
        'voditelj_id',
        'mentor_id',
        'tekst',
        'velika_slika'
    ];
    public function voditelj()
    {
        return $this->belongsTo('App\User','voditelj_id');
    }
    
    public function mentor()
    {
        return $this->belongsTo('App\User','mentor_id');
    }
}
