<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Empresa;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    static function isAdmin()
    {
        if(Auth()->user()->rol == 'admin')
        {
            return true;
        }

        return false;

    }

    static function isAvanzado()
    {
        if(Auth()->user()->rol == 'avanzado')
        {
            return true;
        }
        return false;
    }

    static function isIntermedio()
    {
        if(Auth()->user()->rol == 'intermedio')
        {
            return true;
        }
        return false;
    }

    static function isBasico()
    {
        if(Auth()->user()->rol == 'basico')
        {
            return true;
        }
        return false;
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
