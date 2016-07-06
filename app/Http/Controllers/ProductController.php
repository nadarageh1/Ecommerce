<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Product;
use App\category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Image;
use Validator;
use Response;
use File;
use Form;
use DB;
class ProductController extends Controller {

    public static function getIndex() {
        $products = Product::paginate(2);
        return view('Admins/products_page')->with('products', $products);
    }

    // search product by title
    public static function postSearchproducts(Request $request) {
         $validator = Validator::make($request->all(), Product::$search);
        if ($validator->fails()) {
            return redirect('product')
                            ->withErrors($validator)
                            ->withInput();
         
         }
        else{
             $product_title=$request->Input('title');

            $product =product::where('title','=',$product_title)->get();
                if(count($product)!=0){
                      return view('Admins/page_search_product')->with('product',$product);
                }
                else{
                    return 'no such product';
                }
           }
       }
   
    // add product
    public static function getAddproduct(Request $request) {
        $categories_all = category::all();
        $category = array();
        foreach ($categories_all as $categories) {
            $category[$categories->id] = $categories->name;
        }

        return view('Admins/page_add_product')->with('category', $category);
    }

    public static function postAddproduct(Request $request) {

        $validator = Validator::make($request->all(), Product::$add);
        if ($validator->fails()) {

            return redirect('product/addproduct')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $image = date('Y-m-d-H:i:s') . "-" . $request->image->getClientOriginalName();
            $path = 'images/' . $image;
            Image::make($request->image->getRealPath())->save($path);
            $new_product = new product();
            $new_product->title = $request->Input('title');
            $new_product->category_id = $request->Input('category');
            $new_product->product_pic = $path;
            $new_product->description = $request->Input('description');
            $new_product->price = $request->Input('price');
            $new_product->save();
            return redirect('product');
        }
    }

    // get every products in category
    public static function getProductscategory($id) {
        $products = Product::where('category_id', '=', $id)->paginate(2);
        $category = category::find($id);
        return view('Admins/page_products_category')->with('products', $products)
                        ->with('category', $category);
    }

    // update product
    public static function getUpdateproduct($id) {
        $product = Product::find($id);
        $categories_all = category::all();
        $category = array();
        foreach ($categories_all as $categories) {
            $category[$categories->id] = $categories->name;
        }
        return view('Admins/page_update_product')->with('product', $product)->with('category', $category)
                        ->with('id', $id);
    }
    //post update product

    public static function postUpdateproduct($id, Request $request) {
        $validator = Validator::make($request->all(), Product::$update);
        if ($validator->fails()) {

            return redirect('product/updateproduct/' . $id)
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $product_upd = Product::find($id);
            if ( $product_upd->title !=  $product_upd->title) {
              $product_upd->title = $request->Input('title');
            }
            if ($request->Input('category') != 0) {
                $product_upd->category_id = $request->Input('category');
            } else {
                $product_upd->category_id = $product_upd->category_id;
            }
            if (Input::file('image') != "") {
                $image = date('Y-m-d-H:i:s') . "-" . $request->image->getClientOriginalName();
                $path = 'images/' . $image;
                Image::make($request->image->getRealPath())->save($path);
                $product_upd->product_pic = $path;
            }
            $product_upd->description = $request->Input('description');
            $product_upd->price = $request->Input('price');
            $product_upd->update();
            return redirect('product');
        }
    }

    // delete product
    public static function getDeleteproduct($id) {
        $product = Product::find($id);
        $product->delete();
        File::delete($product->product_pic);
        return redirect('product');
    }

}
