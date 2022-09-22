<?php

declare(strict_types=1);

namespace Core;

use Illuminate\Support\ServiceProvider;

final class CoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->useAppPath('src/Modules');
    }
}
