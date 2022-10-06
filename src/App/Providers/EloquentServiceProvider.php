<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Modules\Container\Entites\Container;
use Modules\Container\Entites\ContainerElement;
use Modules\Container\Entites\ContainerElementModel;
use Modules\Container\Entites\ContainerModel;
use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Entities\LanguageModel;
use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sentences\Entities\SentenceModel;
use Modules\Domain\Sources\Entities\Source;
use Modules\Domain\Sources\Entities\SourceModel;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Entities\UserModel;

final class EloquentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Model::preventLazyLoading();

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
