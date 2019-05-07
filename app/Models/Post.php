<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['userprofile_id', 'image', 'tags', 'destination_id', 'description'];

    public function userprofile()
    {
      return $this->belongsTo('App\Models\Userprofile', 'userprofile_id');
    }

    public function reaction()
    {
      return $this->hasMany('App\Models\Reaction', 'post_id');
    }
}
