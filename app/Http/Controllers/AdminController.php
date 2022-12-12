<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function spots()
    {
        return view('admin/spots');
    }
}
