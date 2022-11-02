<?php

declare(strict_types=1);

namespace Domain\Sources;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Domain\Sources\Events\SourceCreated;

final class SourceServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        foreach (SourceCreated::listeners () as $listener) {
            Event::listen(SourceCreated::class, $listener);
        }
    }
}
