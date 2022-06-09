<?php

namespace Alibahadori\Todo\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class SendTaskStatusViaEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public $task;

    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($task, $user)
    {
        $this->task = $task;

        $this->user = $user;
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
            ->replyTo($this->user->email)
            ->markdown('todo::notifyEmailTemplate', [
                'task' => $this->task,
                'user' => $this->user
            ]);
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
