<?php

namespace App\Http\Controllers;

use App\Models\Spots;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function spots()
    {
        return view('admin/spots');
    }

    public function createzoom()
    {
        $spot = Spots::first();
        return view('admin/createzoom',compact('spot'));
    }

    public function createzoomid(Request $request)
    {

        $spot = Spots::where('id', '=', $request->spotid)->first();
        return view('admin/createzoom',compact('spot'));
    }


}
