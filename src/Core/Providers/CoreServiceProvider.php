<?php

declare(strict_types=1);

namespace Core\Providers;

use Illuminate\Support\ServiceProvider;

final class CoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->useAppPath('src/Domain');
    }
}
