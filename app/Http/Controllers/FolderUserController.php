<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Folder;

class FolderUserController extends Controller
{
    // Affiche la vue principale pour l'affectation des dossiers
    public function index(Request $request)
    {
        // Si un terme de recherche est fourni
        $searchTerm = $request->input('search');

        if (!empty($searchTerm)) {
            // Recherche des utilisateurs basée sur le terme de recherche
            $users = User::where('email', 'LIKE', "%{$searchTerm}%")
                         ->orWhere('prenom', 'LIKE', "%{$searchTerm}%")
                         ->orWhere('name', 'LIKE', "%{$searchTerm}%")
                         ->get(); // Vous pouvez également utiliser paginate() si vous avez beaucoup d'utilisateurs
        } else {
            // Aucun terme de recherche, retourner tous les utilisateurs
            $users = User::all();
        }

        $folders = Folder::all(); // Récupère tous les dossiers, ajustez selon besoin
        
        // Renvoie à la vue avec les utilisateurs (filtrés ou non) et tous les dossiers
        return view('admin.userfolder.index', compact('users', 'folders', 'searchTerm'));
    }



    // Affecte un dossier à un utilisateur
    public function addUserFolder(Request $request)
    {
        $userId = $request->userId;
        $folderId = $request->folderId;
        $user = User::find($userId);
        $user->folders()->attach($folderId);
        return response()->json(['success' => 'Dossier affecté avec succès']);
    }

   

    public function addFolderToUser(Request $request, $userId, $folderId)
{
    // Assurez-vous que l'utilisateur et le dossier existent
    $user = User::findOrFail($userId);
    $folder = Folder::findOrFail($folderId);

    // Vérifiez si l'utilisateur a déjà ce dossier
    if (!$user->folders()->find($folderId)) {
        $user->folders()->attach($folderId); // Attach si pas déjà attaché
        return response()->json(['message' => 'Dossier ajouté avec succès.']);
    }

    return response()->json(['message' => 'L’utilisateur possède déjà ce dossier.'], 400);
}
public function removeUserFolder(Request $request)
{
    $userId = $request->userId;
    $folderId = $request->folderId;
    $user = User::find($userId);
    if ($user) {
        $user->folders()->detach($folderId);
        return response()->json(['success' => 'Association supprimée avec succès']);
    }

    return response()->json(['error' => 'Une erreur s\'est produite'], 422);
}


public function getUserFolders($userId)
{
    $user = User::findOrFail($userId);
    $folders = $user->folders()->where('folders.status', 'private')->get();
    return view('admin.userfolder.partials.userfolders', compact('folders'));
}


    public function searchFolders(Request $request)
    {
        $searchTerm = $request->search;
        $userId = $request->userId; // ID de l'utilisateur pour lequel ajouter des dossiers

        // Exemple basique de recherche par titre de dossier
        // Recherche de dossiers privés par titre
            $query = Folder::where('status', 'private')
            ->where('name', 'LIKE', '%' . $searchTerm . '%');
      

        // Si un userId est fourni, ajustez la requête pour exclure les dossiers déjà associés à cet utilisateur
        if (!empty($userId)) {
            // Assurez-vous de filtrer correctement selon votre logique d'association
            // Ceci est juste un exemple basique
            $query->whereDoesntHave('users', function($q) use ($userId) {
                $q->where('users.id', $userId);
            });
        }

        $folders = $query->get();

        // Retourne une vue partielle avec les résultats de la recherche
        // Assurez-vous que la vue existe et est correctement configurée pour afficher les dossiers
        return view('admin.userfolder.partials.folderlist', compact('folders'));
    }

    public function allPurchases()
    {
        // Récupérer les derniers achats de médias avec les informations sur les utilisateurs
        $purchases = User::latest()
            ->with('mediaPurchases') // Charger la relation mediaPurchases pour chaque utilisateur
            ->paginate(10);
    
        return view('admin.sharemedias.purchases', compact('purchases'));
    }


}
