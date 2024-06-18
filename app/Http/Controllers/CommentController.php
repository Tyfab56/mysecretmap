<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Spots;

class CommentController extends Controller
{

    public function show($id)
    {
        $spot = Spots::with('comments.user')->findOrFail($id);
        return view('frontend.comments.index', compact('spot'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'spot_id' => 'required|exists:spots,id',
            'user_id' => 'required|exists:users,id',
            'pays_id' => 'required|exists:pays,pays_id',
            'comment' => 'required|string|max:240',
        ]);

        // Vérifier si l'utilisateur a déjà commenté ce spot
        $existingComment = Comment::where('spot_id', $request->spot_id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($existingComment) {
            return response()->json(['success' => false, 'message' => 'Vous avez déjà commenté ce spot.']);
        }

        $user = User::findOrFail($request->user_id);
        $actif = $user->autovalidcomment ? 1 : 0;

        Comment::create([
            'spot_id' => $request->spot_id,
            'user_id' => $request->user_id,
            'pays_id' => $request->pays_id,
            'comment' => $request->comment,
            'actif' => $actif, // Initialiser à 0 pour la modération
        ]);

        return response()->json(['success' => true, 'message' => 'Commentaire ajouté avec succès.']);
    }
}
