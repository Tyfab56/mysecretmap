<?php

namespace App\Http\Controllers;
use App\Models\Pictures;
use Illuminate\Http\Request;

class TestController extends Controller
{


    public function index()
    {
        $pictures = Picture::all();
        return view('test',compact(pictures)); 
        
    }
}



