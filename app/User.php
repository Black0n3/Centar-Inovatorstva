<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
        'biografija',
        'slika',
        'adresa',
        'mjesto',
        'broj_iskaznice',
        'oib',
        'rodenje',
        'kontakt',
        'facebook',
        'linkedin',
        'twitter',
        'zanimanje',
        'radni_status',
        'vrsta_clana',
        'udruga_clan',
        'pristupnica'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    public function novosti()
    {
        return $this->hasMany('App\Novosti','user_id');
    }
    
    public function projekti_menotr()
    {
        return $this->hasMany('App\Projekti','mentor_id');
    }
    
    public function projekti_voditelj()
    {
        return $this->hasMany('App\Projekti','voditelj_id');
    }
    
    public function clanarine()
    {
        return $this->hasMany('App\Clanarina','user_id');
    }
    
}

