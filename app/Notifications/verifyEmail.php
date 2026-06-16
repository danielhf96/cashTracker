<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class verifyEmail extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60), // Solo tiene 1 hora para verificar la cuenta
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
            );

        return (new MailMessage)
            ->subject('Confirmas tu cuenta en CashTracker')
            ->greeting('Hola ' . $notifiable->name . '!')
            ->line('Por favor, confirma tu cuenta haciendo clic en el siguiente enlace:')
            ->action('Confirmar cuenta', $verificationUrl)
            ->line('Gracias por usar nuestra aplicación!');
    }
}
