<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stranice extends Model
{
    protected $table = 'stranice';
    protected $fillable = [
        'naziv',
        'tekst'
    ];
}
