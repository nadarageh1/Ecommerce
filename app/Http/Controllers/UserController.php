<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
use Redirect;
use Hash;
use Validator;
use Cart;
class UserController extends Controller
{
 
// login page 
    public function getIndex (){
    return view ('login');
    }
 // sign up
    // user itself log his data
   public function getSignup(){
    return view('register');
   }
   public function postSignup(Request $request){
           $validator = Validator::make(Input::all(),User::$rules);
       if ($validator->fails()) {
      
          return redirect('login/signup')
                        ->withErrors($validator)
                        ->withInput();
      }
        else{
      $user =new User();
      $user->name = $request->Input('name');
      $user->password= Hash::make($request->Input('password'));
      $user->email = $request->Input('email');
      $user->role = 0;
      $user->save();
      return "now you have account login easy ";
    }
   }

   public function postUsers(){
         $email    =Input::get('email');
         $password =Input::get('password');	
       if(Auth::attempt(['email' => $email, 'password' => $password,'role'=>1])){
            // 1 admin
             return redirect('login/pageusers');
            }
            // 0 users
          elseif(Auth::attempt(['email' => $email, 'password' => $password,'role'=>0])){
            $name =Auth::user()->name;
                return view('Users/profileUser')->with('shoppingcart',Cart::content())->
                with('name',$name);
            }
            else{
            return "invalid username or password ";
          }
          }
   // page to show all users in app
    public function getPageusers(){
      $id=Auth::id();
      $user_info =User::find($id);
      $users = User::paginate(4);
      return view('Admins/users_page')->with('users',$users)
              ->with('user_info',$user_info);
    }
  //page to delete  users in app 
    public function getDeleteusers($id){
    $user =User::find($id);
    $user->delete();
    return redirect('login/pageusers');
    }
  //page to update users in app
    public function getUpdateusers($id){
        $info_user = user::find($id);
        return  view('Admins/page_update_users')->with('info_user',$info_user)->with('id',$id);
     
    }
    public function postUpdateusers($id){
         $validator = Validator::make(Input::all(),User::$update);
       if ($validator->fails()) {
      
          return redirect('login/updateusers/'.$id)
                        ->withErrors($validator)
                        ->withInput();
      }
      else{
      $user =User::find($id);
      $user->name = Input::get('name');
      $user->email = Input::get('email');
      $user->password = Hash::make(Input::get('password'));

      if(Input::get('Admin')){
        $user->role = 1;
      }
      else {
         $user->role = 0;
      }
     $user->save();
    return redirect('login/pageusers');
      }
    }
    // page to make admine add users
    public function getAddusers(){
     return  view('Admins/page_add_users');

    }
    public function postAddusers(){
      $validator = Validator::make(Input::all(),User::$rules);
       if ($validator->fails()) {
      
          return redirect('login/addusers')
                        ->withErrors($validator)
                        ->withInput();
      }
    else{
         $user =new User();
      $user->name = Input::get('name');
      $user->password= Hash::make(Input::get('password'));
      $user->email = Input::get('email');
      if(Input::get('Admin')){
        $user->role = 1;
      }
      else {
         $user->role = 0;
      }
     $user->save();
        return redirect('login/pageusers');
    }

    }
    // logout the page
     public function getLogout() {
         Auth::logout();
         return redirect('login');
      
    }
     
}
