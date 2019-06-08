<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $data['destinations'] = Destination::where('name', 'like', '%' . $request->keywords . '%')->get();

        $data['users'] = User::where('username', 'like', '%' . $request->keywords . '%')->orWhere('name', 'like', '%' . $request->keywords . '%')->get();

        return view('front.search', $data);
    }
}
