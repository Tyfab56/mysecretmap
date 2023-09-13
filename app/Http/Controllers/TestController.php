<?php

namespace App\Http\Controllers;
use App\Models\Pictures;
use Illuminate\Http\Request;

class TestController extends Controller
{


    public function index()
    {
        //$pictures = Pictures::paginate(30);
        
        $pictures = DB::table('pictures')
    ->select(DB::raw('MAX(id) as id'))
    ->groupBy('spot_id')
    ->get();

// Obtenez les images complètes correspondant aux ID sélectionnés
$latestPictures = Pictures::whereIn('id', $pictures->pluck('id'))->paginate(30);
        
return view('frontend.test',compact('latestPictures')); 
        
    }
}



