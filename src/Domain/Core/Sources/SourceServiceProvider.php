<?php

declare(strict_types=1);

namespace Domain\Core\Sources;

use Domain\Core\Sources\Events\SourceCreated;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

final class SourceServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        foreach (SourceCreated::listeners () as $listener) {
            Event::listen(SourceCreated::class, $listener);
        }
    }
}
