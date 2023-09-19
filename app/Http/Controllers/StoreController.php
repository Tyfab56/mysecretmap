<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tostore;
use Illuminate\Support\Carbon;

class StoreController extends Controller
{
    public function tostore(Request $request)
    {
        
        // redirection vers le store
        return redirect('https://mysecretmap.myshopify.com/');

    }
}
