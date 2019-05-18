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
    
      // $allfeeds = Post::whereDescription('asdmfkjasndf sakdjfn')->first();


      // dd($allfeeds->tags);

      return view('front.home.newsfeed', compact('allfeeds'));
    }
}
