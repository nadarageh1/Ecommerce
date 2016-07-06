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
    public static $rules=[
     'name' =>'required|unique:users|alpha_num|alpha_dash',
     'email' =>'required|unique:users|email',
     'password' =>'required|min:8|max:16|alpha_num|alpha_dash',
     'repeate-password' =>'same:password'
    ];
    
     public static $update=[
     'name' =>'alpha_dash|alpha_num',
     'email' =>'unique:users|email',
     'password' =>'min:8|alpha_num|alpha_dash',
      
    ];
 

    protected $table = 'users';
    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
