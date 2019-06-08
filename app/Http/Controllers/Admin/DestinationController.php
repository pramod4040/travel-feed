<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destination;

class DestinationController extends Controller
{
    public function list()
    {
    	$destinations = Destination::latest()->get();

    	// dd($destinations);
    	return view('admin.destination.list', compact('destinations'));
    }

    public function toggleVerify($id)
    {
       $destination = Destination::findorfail($id);

       $destination['verified'] = $destination->verified == 1 ? 0 : 1;

       $destination->save();

       return redirect()->back()->with('message', 'Verified Status Changes Successfully.');
    }

    public function togglePublish($id)
    	{
       $destination = Destination::findorfail($id);

       $destination['published'] = $destination->published == 1 ? 0 : 1;

       $destination->save();

       return redirect()->back()->with('message', 'Publish Status Changes Successfully.');
    }
}
