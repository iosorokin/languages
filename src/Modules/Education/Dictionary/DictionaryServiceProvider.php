<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary;

use Illuminate\Support\ServiceProvider;
use Modules\Education\Dictionary\Presenters\CreateDictionary;
use Modules\Education\Dictionary\Presenters\CreateDictionaryPresenter;
use Modules\Education\Dictionary\Repositories\DictionaryRepository;
use Modules\Education\Dictionary\Repositories\EloquentDictionaryRepository;

final class DictionaryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(CreateDictionaryPresenter::class, CreateDictionary::class);
        $this->app->bind(DictionaryRepository::class, EloquentDictionaryRepository::class);
    }
}
