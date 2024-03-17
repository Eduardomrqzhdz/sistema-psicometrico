<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class resultadosCorreo extends Mailable
{
    public $resultados;
    public function __construct($resultados)
    {
        //
        $this->resultados = $resultados;

    }

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */



    public function build()
    {
        return $this->view('usuario.rc')
            ->subject('Resultados de la prueba'); // Asunto del correo

    }
    /**
     * Get the message envelope.
     */
/*    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Resultados Correo',
        );
    }
*/
    /**
     * Get the message content definition.
     */
  /*  public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }
*/
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
