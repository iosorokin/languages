<?php

declare(strict_types=1);

namespace App\Providers;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Structures\LanguageModel;
use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Domain\Sentences\Structures\SentenceModel;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Structures\SourceModel;
use Modules\Internal\Container\Structures\Container;
use Modules\Internal\Container\Structures\ContainerElement;
use Modules\Internal\Container\Structures\ContainerElementModel;
use Modules\Internal\Container\Structures\ContainerModel;
use Modules\Personal\User\Structures\User;
use Modules\Personal\User\Structures\UserModel;

final class EloquentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Model::preventLazyLoading(! $this->app->isProduction());
        Model::preventSilentlyDiscardingAttributes(! $this->app->isProduction());

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
            Arr::get($morphs, User::class) => UserModel::class,
            Arr::get($morphs, Language::class) => LanguageModel::class,
            Arr::get($morphs, Source::class) => SourceModel::class,
            Arr::get($morphs, Container::class) => ContainerModel::class,
            Arr::get($morphs, ContainerElement::class) => ContainerElementModel::class,
            Arr::get($morphs, Sentence::class) => SentenceModel::class,
        ]);
    }
}
