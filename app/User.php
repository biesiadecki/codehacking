<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'is_active',
        'name', 
        'email', 
        'password',
        'photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //add relationship User.php and Role.php
    public function role() {
        return $this->belongsTo('App\Role');
    }

    //add relationship Users.php and Photo.php
    public function photo() {
        return $this->belongsTo('App\Photo');

    }
}
