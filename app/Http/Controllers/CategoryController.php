<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class CategoryController extends Controller
{
    public static function getIndex(){
      $categories =category::paginate(4);
      return view('Admins/categories_page')->with('categories',$categories);
    }
    public static function getUpdatecategory($id){
        $category =category::find($id);
        return view('Admins/page_update_category')->with('category',$category)->with('id',$id);
    }
     public static function postUpdatecategory($id ,Request $request){
        $validator = Validator::make($request->all(),category::$update);
       if ($validator->fails()) {
      
          return redirect('category/updatecategory')
                        ->withErrors($validator)
                        ->withInput();
      }
      else{
        $category =category::find($id);
         $category->name =Input::get('name');
        $category->update() ;
        return redirect('category');
      }
         
   
    }
     public static function getDeletecategory($id){
    $category =category::find($id);
    $category->delete();
    return redirect('category');
    }

	  public static function getAddcategory()
    {
    	return view('Admins/page_add_category');
    }
      public static function postAddcategory(Request $request)
    {
               $validator = Validator::make($request->all(),category::$add);
              
        if ($validator->fails()) {
          return redirect('category/addcategory')
                        ->withErrors($validator)
                       ->withInput();

      }
      else{
        
          $category = new category();
         $category->name =Input::get('name');
        $category->save() ;
        return redirect('category');
      }
     

    }
    public function getCategoryid($id){
       return ProductController::getProductscategory($id);
    }
   
}
