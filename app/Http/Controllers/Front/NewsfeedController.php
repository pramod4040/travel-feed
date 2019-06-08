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
      // $data['allfeeds'] = Post::with(['userprofile.user', 'reaction'])->latest()->get();

      $followedUsers = \Auth()->user()->followedUsers;

      $userprofileidofleaders = [];

      foreach($followedUsers as $users){
         $userprofileidofleaders[] = $users->userprofile->id;
      }

      $allfeeds = collect([]);

      for($i=0; $i<sizeof($userprofileidofleaders); $i++){

        $postfromleader = Post::with(['userprofile.user', 'reaction'])->where('userprofile_id', $userprofileidofleaders[$i])->get();

        $allfeeds = $allfeeds->merge($postfromleader);
      }

      $postedbyuser = Post::with(['userprofile.user', 'reaction'])->where('userprofile_id', \Auth::user()->userprofile->id)->get();

      $allfeeds = $allfeeds->merge($postedbyuser);

      $data['allfeeds'] = $allfeeds;
   
      $data['destinations'] = \App\Models\Destination::orderBy('created_at', 'DESC')->published()->get();

      $Rdestination = $this->recommendPlaces();

      return view('front.home.newsfeed', $data)->with('Rdestination', $Rdestination);
    }
}
