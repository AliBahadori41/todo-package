<?php

namespace Alibahadori\Todo\Listeners;

use Alibahadori\Todo\Notifications\SendTaskStatusViaEmail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailOnTaskClosed
{
    use Queueable;

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = User::find($event->task->user_id);

        $user->notify(new SendTaskStatusViaEmail($event->task, $user));
    }
}
