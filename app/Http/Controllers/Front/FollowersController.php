<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class FollowersController extends Controller
{
    public function store($userIdToFollow)
    {
       $userId = Auth::user()->id;

       $this->followThisUser($userIdToFollow, $userId);
       return redirect()->back()->with('message', 'You are now following');
     }

    public function destroy($idOfUserToUnfollow)
    {
      $userId = Auth::user()->id;
      $currentUser = User::findOrFail($userId);
      $this->unfollowThisUser($idOfUserToUnfollow, $currentUser);
      return redirect()->back();
    }

    public function followThisUser($userIdToFollow, $userId)
    {
        $user = User::findOrFail($userId);
        $user->followedUsers()->attach($userIdToFollow);
    }

    public function unfollowThisUser($idOfUserToUnfollow, $currentUser)
    {
      $currentUser->followedUsers()->detach($idOfUserToUnfollow);
    }

}
