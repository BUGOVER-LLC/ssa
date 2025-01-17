<?php

declare(strict_types=1);

namespace App\Loader;

use Illuminate\Support\Facades\Event;

trait LoadListeners
{
    protected function registerListeners(): void
    {
        foreach ($this->listeners as $event => $listeners) {
            if (\is_array($listeners)) {
                foreach ($listeners as $listener) {
                    Event::listen($event, $listener);
                }
            } else {
                Event::listen($event, $listeners);
            }
        }
    }
}
