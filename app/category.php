<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
     protected $table = 'categories';

     public static $update=[
     'name' =>'unique:categories|alpha_num|alpha_dash',
    
    ];
     public static $add=[
     'name' =>'unique:categories|alpha_num|alpha_dash',
    
    ];
}
