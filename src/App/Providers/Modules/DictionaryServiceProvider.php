<?php

declare(strict_types=1);

namespace App\Providers\Modules;

use App\Contracts\Presenters\Education\Dictionaries\CreateDictionaryPresenter;
use Illuminate\Support\ServiceProvider;
use Modules\Education\Dictionaries\Presenters\CreateDictionary;
use Modules\Education\Dictionaries\Repositories\DictionaryRepository;
use Modules\Education\Dictionaries\Repositories\EloquentDictionaryRepository;

final class DictionaryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(CreateDictionaryPresenter::class, CreateDictionary::class);
        $this->app->bind(DictionaryRepository::class, EloquentDictionaryRepository::class);
    }
}
