<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Userprofile;
use Auth;
use Session;

class CustomRegisterController extends Controller
{
    public function customregister()
    {
      return view('front.auth.register');
    }

    public function saveregister(Request $request)
    {
      $isUserAvailable = User::checkUserAvailable($request->email);
      if($isUserAvailable == 1)
      {
        return redirect()->route('customRegister')->with('error', 'User Already Exists With this Email.');
        die;
      }

       $request->validate([
         'name' => 'required',
         'email' => 'required',
         'gender' => 'required',
         'city' => 'required',
         'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
         'password_confirmation' => 'required_with:password|same:password|min:6',
       ]);

       $user['name'] = $request->name;
       $user['email'] = $request->email;
       $user['password'] = bcrypt($request->password);
       $user['role'] = 'customer';

       $newUser = User::create($user);

       $userProfile['city'] = $request->city;
       $userProfile['gender'] = $request->gender;
       $userProfile['country'] = $request->country;

       $userProfile['user_id'] = $newUser->id;

       $userProfile['pilgrims'] = is_null($request->pilgrims) ? 0 : 1;
       $userProfile['foodie'] = is_null($request->foodie) ? 0 : 1;
       $userProfile['adventure'] = is_null($request->adventure) ? 0 : 1;
       $userProfile['water_body'] = is_null($request->water_body) ? 0 : 1;
       $userProfile['nature_seeing'] = is_null($request->nature_seeing) ? 0 : 1;
       $userProfile['ancient'] = is_null($request->ancient) ? 0 : 1;

       Userprofile::create($userProfile);
       return redirect()->route('customRegister')->with('message', 'User Created Successfully.');
    }

    public function login()
    {
      return view('front.auth.login');
    }

    public function postLogin(Request $request){
      $request->validate([
        'email' => 'required',
        'password' => 'required',
      ]);
      if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
        return redirect()->route('userprofile');
      } else {
        return back()->withInput()->withErrors(['email'=>'something is wrong!']);
      }
    }
}