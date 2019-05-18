<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function post()
    {
      return $this->belongsToMany('App\Models\Tags', 'post_tag', 'post_id', 'tag_id');
    }
}
