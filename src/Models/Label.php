<?php

namespace Alibahadori\Todo\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = [
        'title',
        'slug',
    ];

    /**
     * Bootstrap the model
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->slug = strtolower(str_replace(' ', '_', $model->title));
        });
    }

    /**
     * Get all tasks for this label
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'label_tasks')->withTimestamps();
    }

    /**
     * Count all tasks for this label
     *
     * @return int
     */
    public function countTask()
    {
        return $this->tasks()
            ->where('user_id', auth()->user()->id)
            ->count();
    }
}
