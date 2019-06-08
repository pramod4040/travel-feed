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
}
