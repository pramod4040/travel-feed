<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class NewsfeedController extends Controller
{
    public function newsfeed()
    {
      $allfeeds = Post::with(['userprofile.user', 'reaction'])->latest()->get();
      return view('front.home.newsfeed', compact('allfeeds'));
    }
}
