<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $nom;
    public $prenom;
    public $email;
    public $texte;

    public function __construct($nom, $prenom, $email, $texte)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->texte = $texte;

        $this->to($email, $prenom . ' ' . $nom);
    }

    public function build()
    {
        return $this->subject('Confirmation de soumission de formulaire de contact')
                    ->view('emails.contact-form-confirmation');
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Contact Form Confirmation',
        );
    }

    public function attachments()
    {
        return [];
    }
}
