<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCredit;
use Illuminate\Http\Request;

class UserCreditController extends Controller
{
    // Affiche la liste des utilisateurs et leurs crédits
    public function index()
    {
        $users = User::with('credits')->get(); // Charge les utilisateurs et leurs crédits associés
        return view('admin.credits.index', compact('users')); // Retourne la vue avec les données des utilisateurs
    }

    // Met à jour les crédits pour un utilisateur spécifique
    public function update(Request $request, $userId)
    {
        $user = User::findOrFail($userId); // Trouve l'utilisateur ou renvoie une erreur 404

        // Boucle à travers les crédits soumis et les met à jour ou les crée si nécessaire
        foreach ($request->credits as $mediaType => $creditAmount) {
            UserCredit::updateOrCreate(
                ['user_id' => $userId, 'media_type' => $mediaType], // Clés pour trouver l'enregistrement
                ['credits' => $creditAmount] // Valeur à mettre à jour ou à créer
            );
        }

        return redirect()->back()->with('success', 'Crédits mis à jour avec succès.'); // Redirige l'utilisateur avec un message de succès
    }
}
