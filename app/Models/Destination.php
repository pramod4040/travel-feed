<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function userprofile()
    {
      return $this->belongsToMany('App\Models\Userprofile', 'destination_userprofile', 'destination_id', 'userprofile_id');
    }

    // public function followersUserprofile()
    // {
    //    return $this->belongsToMany('App\Models\Userprofile', '')
    // }

    public function isUserFollower($userprofileId)
    {
       return $this->userprofile()->where('userprofile_id', $userprofileId)->exists();
    }

    public function countFollowers()
    {
      return $this->userprofile()->get()->count();
    }

    public function post()
    {
      return $this->hasMany('App\Models\Post', 'destination_id');
    }

    public function destinationFollowerUser()
    {
        return $this->belongsToMany('App\Models\Userprofile', 'destination_userprofile', 'destination_id', 'userprofile_id');
    }

    public function userFolloweDestination($id)
    {
       return $this->destinationFollowerUser()->where('userprofile_id', $id)->exists();
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
