<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class EmpresaVerify extends Mailable
{
    use Queueable, SerializesModels;

    public $empresa;
    private $admins;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->empresa = $user->userable;
        $this->admins = User::where([
            ['userable_id', null],
            ['userable_type', null]
        ])->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.empresa.verify')
            ->to($this->admins)
            ->subject('Aprovações Pendentes');
    }
}
