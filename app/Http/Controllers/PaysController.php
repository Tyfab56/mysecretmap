<?php

namespace App\Http\Controllers;


use App\Models\Pays;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;


class PaysController extends Controller
{


    public function detail($id)
    {
        $detail = Pays::where('pays_id', '=', $id)->first();
        return Response()->json($detail);
    }
}
