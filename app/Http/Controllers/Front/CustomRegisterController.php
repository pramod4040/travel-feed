<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Userprofile;
use Image;
use Auth;
use Session;
use App\Traits\Recommendation;

class CustomRegisterController extends Controller
{
   use Recommendation;

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
         'profile_image' => 'required|mimes:jpg,jpeg,png,gif|max:1024',
         'email' => 'required',
         'gender' => 'required',
         'city' => 'required',
         'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
         'password_confirmation' => 'required_with:password|same:password|min:6',
       ]);

       $user['name'] = $request->name;
       $user['email'] = $email = $request->email;
       $user['password'] = bcrypt($request->password);
       $user['role'] = 'customer';

       $newUser = User::create($user);
       $username = explode('@', $email);
       $alterUser['username'] = $username[0]. '-' . $newUser->id;
       $newUser->update($alterUser);

       $userProfile['city'] = $request->city;
       $userProfile['gender'] = $request->gender;
       $userProfile['country'] = $request->country;

       $userProfile['profile_image'] = $this->imageProcessing($request->profile_image);

       $userProfile['user_id'] = $newUser->id;

       $userProfile['pilgrims'] = is_null($request->pilgrims) ? 0 : 1;
       $userProfile['foodie'] = is_null($request->foodie) ? 0 : 1;
       $userProfile['adventure'] = is_null($request->adventure) ? 0 : 1;
       $userProfile['waterbody'] = is_null($request->waterbody) ? 0 : 1;
       $userProfile['natureseeing'] = is_null($request->natureseeing) ? 0 : 1;
       $userProfile['ancient'] = is_null($request->ancient) ? 0 : 1;

       Userprofile::create($userProfile);
       // return redirect()->route('customRegister')->with('message', 'User Created Successfully.');

       return redirect()->route('userprofile');
    }

    public function login()
    {
      if(\Auth::user()){
        return redirect()->route('userprofile');
        die;
      }
      return view('front.auth.login');
    }

    public function postLogin(Request $request){
      $request->validate([
        'email' => 'required',
        'password' => 'required',
      ]);
      if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'role' => 'customer'])) {

        // $this->recommendPlaces();

        return redirect()->route('userprofile');
      } elseif ((Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'role' => 'admin']))){
           
        return redirect()->route('adminindex');
      }
      else {
        return back()->withInput()->withErrors(['email'=>'something is wrong!']);
      }
    }

    public function imageProcessing($image)
    {
      $imageName = time() . $image->getClientOriginalName();
      $mainimage = public_path('uploads/userimage/profile/mainimage/');
      $thumbnail = public_path('uploads/userimage/profile/thumbnail/');

      $img = Image::make($image->getRealPath());
      $img->fit(300, 300)->save($mainimage . $imageName);

      $img = Image::make($image->getRealPath());
      $img->fit(85, 70)->save($thumbnail . $imageName);

      $img->destroy();

      return $imageName;
    }

    public function customLogout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

}
