<?php

namespace App\Http\Controllers;
use App\Models\Pictures;
use Illuminate\Http\Request;

class TestController extends Controller
{


    public function index()
    {
        $pictures = Pictures::paginate(30); 
        return view('frontend.test',compact('pictures')); 
        
    }
}



