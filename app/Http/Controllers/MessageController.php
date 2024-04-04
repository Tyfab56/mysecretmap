<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Afficher la liste des messages
    public function index()
    {
        $messages = Message::where('to_id', Auth::id())->get();
        return view('frontend.messages.index', compact('messages'));
    }

    // Afficher un message spécifique
    public function show(Message $message)
    {
        // Assurez-vous que l'utilisateur authentifié a le droit de voir ce message
        if ($message->to_id !== Auth::id()) {
            abort(403);
        }

        return view('frontend.messages.show', compact('message'));
    }

    // Marquer un message comme lu
    public function markAsRead(Message $message)
    {
        if ($message->to_id === Auth::id()) {
            $message->read_at = now();
            $message->save();

            return redirect()->route('frontend.messages.index')->with('success', 'Message marked as read.');
        }

        return back()->with('error', 'Unauthorized access.');
    }

            public function store(Request $request)
        {
            $request->validate([
                'subject' => 'required|string|max:255',
                'body' => 'required|string',
            ]);

            $config = HTMLPurifier_Config::createDefault();
            $purifier = new HTMLPurifier($config);
            $cleanBody = $purifier->purify($request->body);

            Message::create([
                'from_id' => Auth::id(),
                'to_id' => 1,
                'subject' => $request->subject,
                'body' => $cleanBody,
            ]);

            return back()->with('success', 'Votre message a été envoyé avec succès à l\'administrateur.');
        }
}
