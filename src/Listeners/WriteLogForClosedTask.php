<?php

namespace Alibahadori\Todo\Listeners;

use Illuminate\Support\Facades\Log;

class WriteLogForClosedTask
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $id = $event->task->id;

        $user = auth()->user();

        Log::info("Task with ID: $id has been closed by user. Usename: $user->name - userId : $user->id");
    }
}
