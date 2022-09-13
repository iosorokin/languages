<?php

declare(strict_types=1);

namespace App\Providers\Modules\Education;

use App\Contracts\Presenters\Education\Source\CreateRealLanguageSourcePresenter;
use Illuminate\Support\ServiceProvider;
use Modules\Education\Source\Presenters\CreateRealLanguageSource;
use Modules\Education\Source\Repositories\EloquentSourceRepository;
use Modules\Education\Source\Repositories\SourceRepository;

class SourceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(CreateRealLanguageSourcePresenter::class, CreateRealLanguageSource::class);
        $this->app->bind(SourceRepository::class, EloquentSourceRepository::class);
    }
}
