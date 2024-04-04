<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Afficher la liste des messages
    public function index()
    {
        $messages = Message::where('to_id', Auth::id())->get();
        return view('messages.index', compact('messages'));
    }

    // Afficher un message spécifique
    public function show(Message $message)
    {
        // Assurez-vous que l'utilisateur authentifié a le droit de voir ce message
        if ($message->to_id !== Auth::id()) {
            abort(403);
        }

        return view('messages.show', compact('message'));
    }

    // Marquer un message comme lu
    public function markAsRead(Message $message)
    {
        if ($message->to_id === Auth::id()) {
            $message->read_at = now();
            $message->save();

            return redirect()->route('messages.index')->with('success', 'Message marked as read.');
        }

        return back()->with('error', 'Unauthorized access.');
    }
}
