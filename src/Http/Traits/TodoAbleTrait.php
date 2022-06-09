<?php

namespace Alibahadori\Todo\Http\Traits;

use Alibahadori\Todo\Models\Task;

trait TodoAbleTrait
{
    /**
     * Get all tasks for this model
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
