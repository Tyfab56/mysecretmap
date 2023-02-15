<?php

namespace App\Http\Controllers;
use App\Models\Circuits;
use App\Models\Circuits_details;

use Illuminate\Http\Request;

class CircuitsController extends Controller
{
    public function index()
    {
        $circuits = Circuits::where('user_id','=',1)->get();
        return view('admin.circuits',compact('circuits'));
    }
}
