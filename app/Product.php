<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'products';

        public static $update=[
     'title' =>'alpha_num|alpha_dash',
     'image' =>'image',
     'description'=>'required',
     'price' =>'numeric|required',
    
    ];
      public static $add=[
     'title' =>'required|alpha_dash|unique:products|alpha_num',
     'image' =>'required|image',
     'description'=>'required',
     'price' =>'numeric|required',
 
    
    ];
     public static $search=[
     'title' =>'alpha_dash|alpha_num|required',
  
    
    ];
    public static $cartrule=[
    'quantity'=>'required|numeric|min:1|max:1000',
    ];
    public static $paybycredit=[
    'number'=>'required|alpha_num|alpha_dash',
    'email' =>'required|email',
    ];
}
