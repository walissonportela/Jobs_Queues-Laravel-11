<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Criar uma nova instância da mensagem.
     */
    public function __construct(public $user)
    {
        //
    }

    /**
     * Obtém o envelope da mensagem.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Boas vindas Email',
        );
    }

    /**
     * Obtém a definição do conteúdo da mensagem.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.sendWelcomeHtmlEmail',
            text: 'emails.sendWelcomeTextEmail',
        );
    }

    /**
     * Obtém os anexos da mensagem.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
