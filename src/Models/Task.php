<?php

namespace Alibahadori\Todo\Models;

use Alibahadori\Todo\Observers\TaskObserver;
use Alibahadori\Todo\Scopes\TaskOwnerScope;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $dispatchesEvents = [
        'updated'  => TaskObserver::class,
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new TaskOwnerScope);
    }

    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    /**
     * The value of status 'open'
     * 
     * @return string
     */
    const STATUS_OPEN = 'open';

    /**
     * The value of status 'open'
     * 
     * @return string
     */
    const STATUS_CLOSE = 'close';

    /**
     * Possible values for status column.
     *
     * @var string[]
     */
    public static $statusOptions = [
        self::STATUS_OPEN => 'open',
        self::STATUS_CLOSE => 'close',
    ];

    /**
     * Get all labels for this task
     * 
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function labels()
    {
        return $this->belongsToMany(Label::class, 'label_tasks')->withTimestamps();
    }
}
