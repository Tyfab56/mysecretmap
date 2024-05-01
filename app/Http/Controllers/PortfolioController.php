<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShareMedia;
use App\Models\Folder;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = ShareMedia::query()
                           ->join('folders', 'sharemedias.folder_id', '=', 'folders.id')
                           ->where('folders.status', 'public');

        if ($request->has('media_type') && $request->media_type != '') {
            $query->where('sharemedias.media_type', $request->media_type);
        }

        if ($request->has('country_id') && $request->country_id != '') {
            $query->where('folders.country_id', $request->country_id);
        }

        $shareMedias = $query->orderBy('sharemedias.created_at', 'desc')->get(['sharemedias.*']);

        return view('frontend.portfolio', compact('shareMedias'));
    }
}
