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

    // Retire un dossier d'un utilisateur
    public function removeUserFolder(Request $request)
    {
        $userId = $request->userId;
        $folderId = $request->folderId;
        $user = User::find($userId);
        $user->folders()->detach($folderId);
        return response()->json(['success' => 'Dossier retiré avec succès']);
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

public function removeFolderFromUser(Request $request, $userId, $folderId)
{
    $user = User::findOrFail($userId);
    $folder = Folder::findOrFail($folderId);

    if ($user->folders()->find($folderId)) {
        $user->folders()->detach($folderId); // Detach si existant
        return response()->json(['message' => 'Dossier retiré avec succès.']);
    }

    return response()->json(['message' => 'Le dossier n’est pas associé à cet utilisateur.'], 400);
}

public function getUserFolders($userId)
{
    $user = User::findOrFail($userId);
    $folders = $user->folders; 
    return view('admin.userfolder.partials.userfolders', compact('folders'));
}


}
