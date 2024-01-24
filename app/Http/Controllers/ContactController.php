<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormConfirmation;

class ContactController extends Controller
{
    

    public function submitContactForm(Request $request)
    {
       


        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'texte' => 'required|string|max:1000',
        ]);
    
        if ($validator->fails()) {
            return redirect('contact')
                ->withErrors($validator)
                ->withInput();
        }


        // Créer une nouvelle instance de Contact et la sauvegarder
        Contact::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'texte' => $request->input('texte'),
        ]);

        // Envoie de l'e-mail de confirmation
        
            Mail::to('fabrice@my-lovely-planet.com','Requete Internet MSM')
            ->send(new ContactFormConfirmation(
                $request->input('nom'),
                $request->input('prenom'),
                $request->input('email'),
                $request->input('texte')
            ));

          


        // Rediriger l'utilisateur vers une page de confirmation ou autre
        return view('frontend/confirmation');
    }
}