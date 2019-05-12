<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailNovaNoticia extends Mailable
{
    use Queueable, SerializesModels;
    private $noticia;
    private $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($noticia, $url)
    {
        $this->noticia = $noticia;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.nova_noticia')->with('noticia', $this->noticia)->with('url', $this->url)
            ->subject("Univeylandia: " . $this->noticia->titol);
    }
}
