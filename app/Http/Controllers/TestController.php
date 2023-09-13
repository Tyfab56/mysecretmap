<?php

namespace App\Http\Controllers;
use App\Models\Pictures;
use Illuminate\Http\Request;

class TestController extends Controller
{


    public function index()
    {
        //$pictures = Pictures::paginate(30);
        
        $latestPictures = Pictures::selectRaw('MAX(id) as id')
        ->groupBy('spot_id')
        ->orderBy('id', 'desc')
        ->limit(30)
        ->get();
    
    $pictureIds = $latestPictures->pluck('id');
    
    $pictures = Pictures::whereIn('id', $pictureIds)
        ->orderBy('created_at', 'desc')
        ->paginate(30);
        
return view('frontend.test',compact('pictures')); 
        
    }
}



