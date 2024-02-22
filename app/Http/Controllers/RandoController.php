<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RandoSpot;

class RandoController extends Controller
{
    public function listRando()
    {
        $randos = RandoSpot::all(); // Assurez-vous d'avoir le modèle RandoSpot
        return view('admin.randos.listrandos', compact('randos'));
    }
}
