<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\Despesa;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DespesaCadastrada extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(Despesa $despesa)
    {
        $this->despesa = $despesa;
    }

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
        $despesa = $this->despesa;
       return (new MailMessage)
        ->line('Uma nova despesa foi cadastrada.')
        ->action('Ver Despesa', url('/despesas/' . $this->despesa->id))
        ->line('Obrigado por usar nossa aplicação!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
