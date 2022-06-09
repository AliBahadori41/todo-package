<?php

namespace Alibahadori\Todo\Observers;

use Alibahadori\Todo\Events\TaskClosedEvent;
use Alibahadori\Todo\Models\Task;

class TaskObserver
{
    /**
     * Handle the task "updated" event.
     *
     * @param  Alibahadori\Todo\Models\Task  $task
     * @return void
     */
    public function updated(Task $task)
    {
        if ($task->status == Task::STATUS_CLOSE) {
            event(new TaskClosedEvent($task));
        }
    }
}
