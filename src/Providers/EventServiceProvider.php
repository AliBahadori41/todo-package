<?php

namespace Alibahadori\Todo\Providers;

use Alibahadori\Todo\Events\TaskClosedEvent;
use Alibahadori\Todo\Listeners\SendEmailOnTaskClosed;
use Alibahadori\Todo\Listeners\WriteLogForClosedTask;
use Alibahadori\Todo\Models\Task;
use Alibahadori\Todo\Observers\TaskObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        TaskClosedEvent::class => [
            SendEmailOnTaskClosed::class,
            WriteLogForClosedTask::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Task::observe(TaskObserver::class);

        parent::boot();
    }
}