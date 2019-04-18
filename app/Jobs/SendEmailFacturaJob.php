<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailFactura;
use Mail;

class SendEmailFacturaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    protected $factura;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details, $ruta_factura_pdf_final)
    {
        $this->details = $details;
        $this->factura = $ruta_factura_pdf_final;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $adjunt_factura = $this->factura;
      $email = new SendEmailFactura($adjunt_factura);
      Mail::to($this->details['email'])
        ->send($email);
    }
}
