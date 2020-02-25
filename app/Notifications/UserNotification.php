<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    use Queueable;

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
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'email' => $this->details['email'],
            'name' => $this->details['name'],
            'subject' => $this->details['subject'],
            'message' => $this->details['message']
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'email' => $this->details['email'],
            'name' => $this->details['name'],
            'subject' => $this->details['subject'],
            'message' => $this->details['message']
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'email' => $this->details['email'],
            'name' => $this->details['name'],
            'subject' => $this->details['subject'],
            'message' => $this->details['message']
        ];
    }
}
