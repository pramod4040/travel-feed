<?php
namespace App\Traits;

trait FollowableTrait {

  public function followedUsers()
  {
    return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followed_id')->withTimestamps();
  }

  public function followers()
  {
    return $this->belongsToMany('App\User', 'follows', 'followed_id', 'follower_id')->withTimestamps();
  }

  public function is($currentUser)
  {
      if ($this->id == $currentUser->id)
      {
          return true;
      } else
      {
          return false;
      }
  }

  public function isFollowedBy($currentUser)
  {
      $followingIds = $currentUser->followedUsers()->lists('followed_id');

      // Check if a value is in array
      return in_array($this->id, $followingIds);
  }

  public function isUserFollower($userId)
  {
     return $this->followers()->where('follower_id', $userId)->exists();
  }

  public function countFollowers()
  {
    return $this->followers()->get()->count();
  }

}


?>
