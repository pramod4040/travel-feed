<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function post()
    {
      return $this->hasMany('App\Models\Post', 'userprofile_id');
    }

    // public function getAllPosts($user)
    // {
    //   return $user->post()hasMany('App\Models\Post', 'userprofile_id')
    // }
}
