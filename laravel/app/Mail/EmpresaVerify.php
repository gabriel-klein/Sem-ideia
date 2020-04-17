<?php

namespace App\Mail;

use App\Empresa;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmpresaVerify extends Mailable
{
    use Queueable, SerializesModels;

    public $empresa;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->empresa = Empresa::find(1);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.empresa.verify')
            ->subject('Aprovações pendentes');
    }
}
