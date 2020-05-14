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

    static function isUser()
    {
        if(Auth()->user()->rol == 'user')
        {
            return true;
        }
        return false;
    }

    static function isManager()
    {
        if(Auth()->user()->rol == 'manager')
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
