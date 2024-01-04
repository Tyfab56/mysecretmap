<?php
namespace App\Http\Controllers;

use App\Models\SpotsTranslation;
use Illuminate\Http\Request;

class VideoController extends Controller
{
            public function show($id, $locale)
        {
            $traduction = SpotsTranslation::where('spots_id', '=', $id)
                                ->where('locale', '=', $locale)
                                ->first();

            return response()->json([
                'videoCode' => $traduction->video1 ?? ''
            ]);
        }   
}