<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function posts()
    {
      return $this->belongsTo('App\Models\Post', 'post_id');
    }

    public static function likesCount($id)
    {
       $likes = Reaction::where([
         ['post_id', '=', $id],
         ['like', '=', 1]
      ])->get()->count();
      return $likes;
    }
}
