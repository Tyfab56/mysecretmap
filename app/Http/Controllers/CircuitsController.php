<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CircuitsController extends Controller
{
    public function index($id, $spotid = null)
    {
        return view('admin.circuits');
    }
}
