<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
            ->from('juliakimura@univem.edu.br', 'Support')
            ->to($this->dados->email, $this->dados->name)
            ->subject('Relatório Importante')
            ->view('mail.index')
            ->with([
                'data' => $this->dados
            ]);
    }
}
