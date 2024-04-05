<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageAdminController extends Controller
{
    // Afficher tous les messages
    public function index()
    {
        $messages = Message::latest()->get();
        $users = User::all(); // Récupère tous les utilisateurs
        return view('admin.messages.index', compact('messages','users'));
    }

    // Afficher un message spécifique
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.messages.show', compact('message'));
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
