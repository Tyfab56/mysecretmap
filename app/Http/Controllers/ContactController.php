<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    

    public function submitContactForm(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:contacts',
            'texte' => 'required',
        ]);

        // Créer une nouvelle instance de Contact et la sauvegarder
        Contact::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'texte' => $request->input('texte'),
        ]);

        // Rediriger l'utilisateur vers une page de confirmation ou autre
        return redirect('frontend.confirmation');
    }
}