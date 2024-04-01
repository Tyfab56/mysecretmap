<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Folder;

class FolderUserController extends Controller
{
    // Affiche la vue principale pour l'affectation des dossiers
    public function index()
    {
        $users = User::all(); // Ou une pagination si vous avez beaucoup d'utilisateurs
        $folders = Folder::all(); // Idem pour les dossiers
        return view('admin.userfolder.index', compact('users', 'folders'));
    }

    // Renvoie les dossiers actuellement affectés à l'utilisateur
    public function getUserFolders(Request $request)
    {
        $userId = $request->userId;
        $userFolders = User::find($userId)->folders;
        return response()->json($userFolders);
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
}
