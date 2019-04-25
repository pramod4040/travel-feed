<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reaction;

class ReactionController extends Controller
{
    public function likePost($post_id)
    {
      $userprofile_id = \Auth()->user()->userprofile->id;

      $data = Reaction::firstOrCreate(['userprofile_id' => $userprofile_id, 'post_id' => $post_id]);

      if($data->like == 0 OR is_null($data->like))
      {
         $data->like = 1;
      }else {
        $data->like = 0;
      }
      $check = $data->save();

      if($check){
        return response()->json([
            'success' => 'Post Reaction Altered'
          ]);
          die;
      } else {
        return response()->json([
            'error' => 'Something happen in controller'
          ]);
      }

    }

    public function countLike($postid)
    {
      $likes = Reaction::likesCount($postid);
      return response()->json(['like' => $likes]);
    }
}
