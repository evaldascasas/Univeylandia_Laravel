<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailVentes;
use Mail;
use File;

class SendEmailVentesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $correu_user;
    protected $arxiu_exportacio;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($arxiu_exportacio, $correu_user)
    {
        $this->correu_user = $correu_user;
        $this->arxiu_exportacio = $arxiu_exportacio;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $adjunt_factura = $this->arxiu_exportacio;
      $email = new SendEmailVentes($adjunt_factura);
      Mail::to($this->correu_user)
        ->send($email);
      File::delete($adjunt_factura);
    }
}
