<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCredit;
use Illuminate\Http\Request;

class UserCreditController extends Controller
{
    // Affiche la liste des utilisateurs et leurs crédits
    public function index(Request $request)
    {
        $searchTerm = $request->input('search', ''); // Récupère le terme de recherche depuis la requête, '' par défaut
    
        // Utilise la méthode when pour conditionnellement appliquer un filtre de recherche si searchTerm est présent
        $users = User::with('credits')
                     ->where('email', 'LIKE', '%' . $searchTerm . '%')
                     ->orWhere('first_name', 'LIKE', '%' . $searchTerm . '%') // Supposons que vous avez un champ first_name
                     ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%') // Supposons que vous avez un champ last_name
                     ->paginate(9); // Paginer les résultats pour afficher 9 utilisateurs par page
    
        return view('admin.credits.index', compact('users', 'searchTerm'));
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
