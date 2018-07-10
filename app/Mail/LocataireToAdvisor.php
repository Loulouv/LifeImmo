<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LocataireToAdvisor extends Mailable
{
    use Queueable, SerializesModels;

    public $demande;
    public $bien;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demande, $bien, $user)
    {
        $this->demande = $demande;
        $this->bien = $bien;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         //définir quelle adresse mail utilisera le conseillé pour recevoir les commandes
         return $this->to('louis.vernet@outlook.com')
                        ->subject('Demande de rendez-vous location')
                        ->view('emails.LocataireToAdvisor');
    }
}
