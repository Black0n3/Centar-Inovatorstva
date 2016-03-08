<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pristupnica extends Model
{
    protected $table = 'pristupnica';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'adresa',
        'mjesto',
        'oib',
        'rodenje',
        'kontakt',
        'zanimanje',
        'radni_status',
        'pristupnica'
    ];
}
