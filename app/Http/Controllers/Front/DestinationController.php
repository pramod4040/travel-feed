<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use Auth;
use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

use Image;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.destination.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
          'name' => 'required',
          'description' => 'required',
          // 'image' => 'required|mimes:jpg,png,gif,jpeg|max:3048',
          'image' => 'required|max:2048|mimes:jpg,jpeg,gif,png',
        ]);
        $data = $request->except(['image']);
        $data['slug'] = Str::slug($request->name);
        try {
          if($request->hasFile('image')){
            $data['image'] = $this->imageProcessing($request->image);
          }
          Destination::create($data);
        } catch (\Illuminate\Database\QueryException $e){
            return back()->with('error', 'This Destination Already Exists!!!');
            // die;
        }
        return back()->with('message', 'Destination added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data['destination']= $destination = Destination::whereSlug($slug)->with('post')->first();
        // dd($destination);
        if(count($destination) == 1){
          $data['userprofile'] = Auth::user()->userprofile;
          return view('front.destination.profile', $data);
        } else {
          abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function followStore($destinationId)
    {
       $userprofile = Auth::user()->userprofile;

       $userprofile->destinationFollower()->attach($destinationId);

       return redirect()->back()->with('message', 'Successfull.');
    }

    public function unfollowDestination($destinationId)
    {
      $userprofile = Auth::user()->userprofile;

      $userprofile->destinationFollower()->detach($destinationId);

      return redirect()->back()->with('message', 'Removed Successfull.');
    }

    public function imageProcessing($image)
    {
      $imageName = time() . $image->getClientOriginalName();

      $mainimage = public_path('uploads/mainimage/');
      $thumbnail = public_path('uploads/thumbnail/');

      $img = Image::make($image->getRealPath());
      $img->fit(1516, 498)->save($mainimage . $imageName);

      $img->fit(200, 200)->save($thumbnail . $imageName);
      $img->destroy();

      return $imageName;
    }

}
