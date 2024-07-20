<?php

namespace App\Mail;

use App\Models\DemandeService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceRequestCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $demandeService;

    public function __construct(DemandeService $demandeService)
    {
        $this->demandeService = $demandeService;
    }

    public function build()
    {
        return $this->view('emails.service_request_created')
                    ->with([
                        'titre' => $this->demandeService->titre,
                        'description' => $this->demandeService->description,
                        'adresse' => $this->demandeService->adresse
                    ]);
    }
}
