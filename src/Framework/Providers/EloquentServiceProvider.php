<?php

declare(strict_types=1);

namespace Framework\Providers;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Core\Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Sentences\Model\Sentence;
use WIP\Core\Sources\Structures\Source;
use WIP\Internal\Container\Model\Container;
use WIP\Internal\Container\Model\ContainerElement;

final class EloquentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Model::preventLazyLoading(! $this->app->isProduction());

        DB::whenQueryingForLongerThan(500, function () {
            if ($this->app->isProduction()) {
                throw new Exception(sprintf(
                    'Запрос на маршрут %s в %s выполнялся более 500мс',
                    Request::path(),
                    now()->toDateTimeString(),
                ));
            }
        });

        $morphs = config('morph');
        Relation::enforceMorphMap([
            Arr::get($morphs, EloquentUserModel::class) => EloquentUserModel::class,
            Arr::get($morphs, LanguageModel::class) => LanguageModel::class,
            Arr::get($morphs, Source::class) => Source::class,
            Arr::get($morphs, Container::class) => Container::class,
            Arr::get($morphs, ContainerElement::class) => ContainerElement::class,
            Arr::get($morphs, Sentence::class) => Sentence::class,
        ]);
    }
}
