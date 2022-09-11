<?php

declare(strict_types=1);

namespace App\Providers\Modules\Education;

use App\Contracts\Presenters\Education\Source\CreateRealLanguageSourcePresenter;
use Illuminate\Support\ServiceProvider;
use Modules\Education\Source\Presenters\CreateRealLanguageSource;

class SourceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(CreateRealLanguageSourcePresenter::class, CreateRealLanguageSource::class);
    }
}
