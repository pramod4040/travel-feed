<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reaction;
use App\Models\Post;
use App\Models\Userprofile;

class ReactionController extends Controller
{
    public function likePost($post_id)
    {
      $userprofile_id = \Auth()->user()->userprofile->id;

      $data = Reaction::firstOrCreate(['userprofile_id' => $userprofile_id, 'post_id' => $post_id]);

      // $data->refresh;

      if($data->like == 0 OR is_null($data->like))
      {
         $data->like = 1;
         $this->categoryLikeCountToggle($post_id, $userprofile_id, 'increase');
      }else {
        $data->like = 0;
        $this->categoryLikeCountToggle($post_id, $userprofile_id, 'decrease');
        // $this->decreaseCategoryLikeCount($post_id, $userprofile_id);
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
      // $data = Post::with('reaction', function($query) {
      //    $query->where('like', '1');
      // })->where('id', $postid)->first();
      // // $likes = $data->reaction;
      // // foreach($likes)
      // // dd($ikes);
      // dd($data);

      $likes = Reaction::likesCount($postid);
      return response()->json(['like' => $likes]);
    }

    public function categoryLikeCountToggle($post_id, $userprofile_id, $type)
    {
       $postCategory = Post::whereId($post_id)->first();
       $field = $postCategory->category_type . '_like';

       $findRow = Userprofile::whereId($userprofile_id)->first();
       $previousValue = $findRow->$field;
       if($type == 'increase'){
         $data[$field] = $previousValue + 1;
       }else{
          $data[$field] = $previousValue - 1;
       }
       $findRow->update($data);
    }
}
