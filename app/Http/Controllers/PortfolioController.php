<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShareMedia;
use App\Models\Folder;
use App\Models\Pays; // Assurez-vous d'avoir ce modèle

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

        if ($request->has('pays_id') && $request->pays_id != '') {
            $query->where('folders.country_id', $request->pays_id);
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('sharemedias.title', 'like', '%' . $search . '%')
                      ->orWhereHas('folder', function ($query) use ($search) {
                          $query->where('name', 'like', '%' . $search . '%');
                      });
            });
        }

        $shareMedias = $query->orderBy('sharemedias.created_at', 'desc')->paginate(40);
        $activePays = Pays::where('actif', 1)->get();

        return view('frontend.portfolio', compact('shareMedias', 'activePays'));
    }
}

