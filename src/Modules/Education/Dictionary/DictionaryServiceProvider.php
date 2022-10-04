<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary;

use Illuminate\Support\ServiceProvider;
use Modules\Education\Dictionary\Factories\DictionaryFactory;
use Modules\Education\Dictionary\Factories\ModelDictionaryFactory;
use Modules\Education\Dictionary\Policies\DictionaryPolicy;
use Modules\Education\Dictionary\Policies\LaravelDictionaryPolicy;
use Modules\Education\Dictionary\Presenters\User\UserCreateDictionary;
use Modules\Education\Dictionary\Presenters\User\UserCreateDictionaryPresenter;
use Modules\Education\Dictionary\Repositories\DictionaryRepository;
use Modules\Education\Dictionary\Repositories\EloquentDictionaryRepository;

final class DictionaryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(UserCreateDictionaryPresenter::class, UserCreateDictionary::class);
        $this->app->bind(DictionaryRepository::class, EloquentDictionaryRepository::class);
        $this->app->bind(UserCreateDictionaryPresenter::class, UserCreateDictionary::class);
        $this->app->bind(DictionaryFactory::class, ModelDictionaryFactory::class);
        $this->app->bind(DictionaryPolicy::class, LaravelDictionaryPolicy::class);
    }
}
