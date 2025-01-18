<?php

declare(strict_types=1);

namespace Core\Abstract;

use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Eloquent\Models\User;

abstract class AbstractObserver implements ShouldQueue, ShouldHandleEventsAfterCommit
{
    public bool $afterCommit = true;

    /**
     * @var User|null
     */
    protected User|null $emitting = null;

    public function __construct()
    {
        $this->emitting = Auth::user();
    }

    /**
     * @param Model $model
     * @return void
     */
    public function creating(Model $model): void
    {
        // @todo before created
    }

    /**
     * @param Model $model
     * @return void
     */
    abstract public function created(Model $model): void;

    /**
     * @param Model $model
     * @return void
     */
    public function updating(Model $model): void
    {
        // @todo before updating
    }

    /**
     * @param Model $model
     * @return void
     */
    abstract public function updated(Model $model): void;

    /**
     * @param Model $model
     * @return void
     */
    public function saving(Model $model): void
    {
        // @todo before saved
    }

    /**
     * @param Model $model
     * @return void
     */
    abstract public function saved(Model $model): void;

    /**
     * @param Model $model
     * @return void
     */
    public function deleting(Model $model): void
    {
        // @todo before deleting
    }

    /**
     * @param Model $model
     * @return void
     */
    abstract public function deleted(Model $model): void;

    /**
     * @param Model $model
     * @return void
     */
    public function restoring(Model $model): void
    {
        // @todo restoring body
    }

    /**
     * @param Model $model
     * @return void
     */
    public function restored(Model $model): void
    {
        // @todo restored body
    }

    /**
     * @param Model $model
     * @return void
     */
    public function retrieved(Model $model): void
    {
        // @todo retrieved body
    }

    public function forceDeleting(Model $model): void
    {
        // @todo before force deleting
    }

    /**
     * @param Model $model
     * @return void
     */
    public function forceDeleted(Model $model): void
    {
        // @todo restored body
    }

    /**
     * @param Model $model
     * @return void
     */
    public function replicating(Model $model): void
    {
        // @todo replicating body
    }

    public function trashed(Model $model)
    {
        // @todo trashed body
    }
}
