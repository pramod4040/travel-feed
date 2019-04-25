<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Models\Post;
use Session;

class ProfileController extends Controller
{
  public function index()
  {
    $thatPost = Session::get('latestPost');
    // Session::forget('latestPost');

    return view('front.user.profile', compact('thatPost'));
  }

}
