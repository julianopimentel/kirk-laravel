<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class AlterarSenha extends Notification
{
    use Queueable;

    private $details;
   
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
   
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->subject($this->details['subject'])
                    ->greeting($this->details['greeting'])
                    ->line($this->details['body'])
                    ->action($this->details['actionText'], $this->details['actionURL']);
    }

    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->details['user_id'],
            'class' => 'bg-danger',
            'icon' => 'fa-calendar-check',
            'mensagem' => 'notification.alter_password',
        ];
    }
}
