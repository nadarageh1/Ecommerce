<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\category;
use Cart;
use Validator;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;

class EcommerceController extends Controller
{
   public static function getIndex(){
   	$categories=Category::all();
    // order products from last
   $products = Product::orderBy('id', 'DESC')->paginate(12);
   return view ('Users/page_products')->with('products',$products)->
   with('categories',$categories);
   }
   // add to cart
     public static function getAddtocart(Request $request,$id){
        $product= Product::find($id);
       Cart::add(
       array(
       'id'=>$product->id,
       'name'=>$product->title,
       'qty'=> 1,
       'price'=>$product->price,
       'options'=>  array('image'=>$product->product_pic)
       ));
      return redirect('Ecommerce');

   }
   // remove cart to bild new cart
   public static function getRemovecart(){
  Cart::destroy();
 return redirect('Ecommerce/shoppingcart');
   }

   // shopping cart
   public static function getShoppingcart(){
      return view('Users/shoppingcart')->with('products',Cart::content());
   }
      public static function getCategoryProducts($id){
        $products_category =product::where('category_id','=',$id)->paginate(12);
         return view('Users/categoryproducts')->with('products_category',$products_category);
    
   }
   // confirm shopping cart
   public static function getSubmitShopping(){
    return view('login');
   }
   // payment by credit card
   public static function getPaymentbycreditcard(){
   return view('Users/paymentbycreditcard');
   }
   // congrate for your shopping
    public static function postPaymentbycreditcard(Request $request){
           $validator = Validator::make($request->all(),Product::$paybycredit);
       if ($validator->fails()) {
      
          return redirect('Ecommerce/paymentbycreditcard')
                        ->withErrors($validator)
                        ->withInput();
      }
      else{
           return view('Users/congrateforpurching');
      }
   }

   // payment cash
   public static function getPaymentcash(){
    return view('Users/paymentcash');
   }
}
