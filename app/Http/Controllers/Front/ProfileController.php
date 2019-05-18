<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\User;
use Session;

class ProfileController extends Controller
{
  public function index()
  {
    // $data['thatPost'] = Session::get('latestPost');
    // Session::forget('latestPost');

    $id = \Auth::user()->id;

    $data['user'] = $user = User::find($id);

    $userprofileId = $user->userprofile->id;

    $data['allPosts'] = Post::where('userprofile_id', $userprofileId)->with(['userprofile.user', 'reaction'])->latest()->get();

    $data['destinations'] = \App\Models\Destination::orderBy('created_at', 'DESC')->get();

    // $data['allPosts'] = $user->userprofile->post()->latest()->get();

    // dd($data);


    return view('front.user.profile', $data);
  }

  public function userProfile($username)
  {
     $data['user'] = $user = User::whereUsername($username)->first();
     $data['allPosts'] = $user->userprofile->post()->latest()->get();
     $data['destinations'] = \App\Models\Destination::orderBy('created_at', 'DESC')->get();
     return view('front.user.profile', $data);
  }

}
