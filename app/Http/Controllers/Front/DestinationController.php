<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use Auth;
use App\Models\Post;

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
        $request->validate([
          'name' => 'required',
          'description' => 'required',
        ]);
        $data = $request->all();

        Destination::create($data);

        return back()->with('message', 'Destination added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $data['destination']= $destination = Destination::whereName($name)->with('post')->first();
        // dd($destination);
        if(count($data['destination']) == 1){
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
}