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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom, $prenom, $email, $texte)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->texte = $texte;
    }

    public function build()
    {
        return $this->subject('Confirmation de soumission de formulaire de contact')
            ->view('emails.contact-form-confirmation'); 
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Contact Form Confirmation',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'frontend.confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
