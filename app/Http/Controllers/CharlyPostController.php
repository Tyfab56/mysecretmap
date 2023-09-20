<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CharlyPost; 
use App\Models\CharlyPostTranslation;

class CharlyPostController extends Controller
{
    public function index($pays_id)
    {
        $posts = CharlyPost::where('pays_id', $pays_id)
                        ->orderBy('rang', 'desc') // ou 'created_at' ou autre colonne selon votre choix
                        ->paginate(10);
    
        return view('frontend.charlypost', compact('posts'));
    }
    
}
