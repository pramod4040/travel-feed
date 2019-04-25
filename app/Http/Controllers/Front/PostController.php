<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Image;
use Session;
use Auth;

class PostController extends Controller
{
  public function savePost(Request $request)
  {
     $request->validate([
       'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
       'tags' => 'required',
       'destination_id' => 'required',
       'description' => 'required'
     ]);

     $post = $request->except(['image']);

     $post['userprofile_id'] = Auth::user()->userprofile->id;

     if($request->hasFile('image')){
       $post['image'] = $this->imageProcessing($request->image);
     }
     // dd($post);
     $post = Post::create($post);
     Session::put('latestPost', $post);
     return redirect()->route('userprofile');

  }

  public function imageProcessing($image)
  {
    $imageName = time() . $image->getClientOriginalName();

    $mainimage = public_path('uploads/mainimage/');
    $thumbnail = public_path('uploads/thumbnail/');

    $img = Image::make($image->getRealPath());
    $img->fit(563, 374)->save($mainimage . $imageName);

    $img->fit(200, 200)->save($thumbnail . $imageName);
    $img->destroy();

    return $imageName;
  }
}
