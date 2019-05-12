<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TicketClientCreate extends Notification
{
    use Queueable;

    private $contacte;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contacte)
    {
        $this->contacte = $contacte;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hola, ' . $this->contacte->nom)
            ->line('Estem treballant per resoldre el ticket lo mes pronte possible, al finalitzar rebra més informació')
            ->line('El id del ticket és: ' . $this->contacte->id_tiquet);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
