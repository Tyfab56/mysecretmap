<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageAdminController extends Controller
{
    // Afficher tous les messages
    public function index(Request $request)
    {

        if ($request->has('userId')) {
            // Si un utilisateur est sélectionné, récupérez les messages uniquement pour cet utilisateur
            $userId = $request->input('userId');
            $selectedUser = User::findOrFail($userId); 
            $messages = Message::orderBy('created_at', 'desc')->where('to_id', $userId)->paginate(20);
            // Passer l'ID de l'utilisateur sélectionné à la vue
            return view('frontend.messages.index', ['messages' => $messages, 'selectedUserId' => $userId,'selectedUser' => $selectedUser]);
        } else {
            // Sinon, récupérez tous les messages
            $messages = Message::orderBy('created_at', 'desc')->paginate(20);
            return view('frontend.messages.index', ['messages' => $messages]);
        }
    }

    public function store(Request $request)
{
    // Validation des données
    $validated = $request->validate([
        'recipient' => 'required', // Assurez-vous que le destinataire existe
        'message' => 'required|string',
    ]);

    // Création d'une nouvelle instance de message
    $message = new Message();
    $message->from_id = auth()->id(); // L'ID de l'utilisateur connecté comme expéditeur
    $message->to_id = $request->recipient; // L'ID du destinataire
    $message->body = $request->message; // Le corps du message
    $message->read_at = null; // Initialisé à null, peut être modifié lorsque le message est lu
    $message->save(); // Sauvegarde du message dans la base de données

    

    // Redirige l'utilisateur vers la page précédente avec un message de session
    return back()->with('success', 'Message envoyé avec succès.');
}

    // Afficher un message spécifique
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.message.show', compact('message'));
    }

    // Marquer un message comme lu
    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        $message->read_at = now();
        $message->save();
        return redirect()->back()->with('success', 'Message marqué comme lu avec succès.');
    }

    // Supprimer un message
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Message supprimé avec succès.');
    }

    // Autres méthodes pour gérer les actions administratives sur les messages...
}
