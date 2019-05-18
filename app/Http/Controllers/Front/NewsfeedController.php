<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\Recommendation;

class NewsfeedController extends Controller
{
    use Recommendation;

    public function newsfeed()
    {
      $data['allfeeds'] = Post::with(['userprofile.user', 'reaction'])->latest()->get();

      $Rdestination = $this->recommendPlaces();

      // dd($Rdestination);
// dd($Rdestination);
      // dd($data);
      // $allfeeds = Post::whereDescription('asdmfkjasndf sakdjfn')->first();


      // dd($allfeeds->tags);

      return view('front.home.newsfeed', $data)->with('Rdestination', $Rdestination);
    }
}
