<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailVentes extends Mailable
{
    use Queueable, SerializesModels;
    protected $factura;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adjunt_factura)
    {
      $this->factura = $adjunt_factura;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.exportacio_ventes')
        ->attach($this->factura)
        ->subject('Univeylandia: Exportacio ventes');
    }
}
