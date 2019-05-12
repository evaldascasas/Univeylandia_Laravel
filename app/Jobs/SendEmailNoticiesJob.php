<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailNovaNoticia;
use \App\User;
use Mail;

class SendEmailNoticiesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $noticia;
    private $url;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($noticia, $url)
    {
        $this->noticia = $noticia;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $clients = User::where('id_rol', 1)->get();
        foreach ($clients as $client) {
          $email = new SendEmailNovaNoticia($this->noticia, $this->url);
          Mail::to($client->email)
            ->send($email);
            sleep(5);
        }
    }
}
