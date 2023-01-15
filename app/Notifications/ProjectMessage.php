<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Notifications\CustomDbChannel;

class ProjectMessage extends Notification
{
    use Queueable; 
    public $activity_id;
    public $project_id;
    public $message_text;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($activity_id, $project_id, $message_text)
    {
        $this->activity_id   = $activity_id;
        $this->project_id   = $project_id;
        $this->message_text = $message_text;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['database'];
        return [CustomDbChannel::class];
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
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    
    public function toDatabase($notifiable)
    {
        return [
            'message'    => $this->message_text,
            'activity_id' => $this->activity_id,
            'project_id' => $this->project_id,
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [];
    }
}
