<?php

namespace App\Mail;

use App\User;
use App\Vaga;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VagaRevisar extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    public $vaga;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Vaga $vaga)
    {
        $this->user = $user;
        $this->vaga = $vaga;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.vaga.revisar')
            ->to($this->user)
            ->subject('Aprovações Pendentes');
    }
}
