<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['userprofile_id', 'image', 'tags', 'destination_id', 'description', 'category_type'];

    public function userprofile()
    {
      return $this->belongsTo('App\Models\Userprofile', 'userprofile_id');
    }

    public function reaction()
    {
      return $this->hasMany('App\Models\Reaction', 'post_id');
    }

    public function tags()
    {
      return $this->belongsToMany('App\Models\Tags', 'post_tag', 'post_id', 'tag_id');
    }

    public function destination()
    {
      return $this->belongsTo('App\Models\Destination', 'destination_id');
    }
}
