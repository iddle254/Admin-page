<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    // public function setPasswordAttribute($password)
    // {
    //     if (!empty($password)) {
    //         $this->attributes['password'] = bcrypt($password);
    //     }
    // }

    public function isAdmin()
    { 
        if($this->role->name == "Administrator" && $this->is_active == 1){   
            return true;   
        }   
        return false;   
     }
}
