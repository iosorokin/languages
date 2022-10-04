<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Modules\Container\Entites\Container;
use Modules\Container\Entites\ContainerModel;
use Modules\Education\Dictionary\Entities\Dictionary;
use Modules\Education\Dictionary\Entities\DictionaryModel;
use Modules\Education\Rules\Entities\Rule;
use Modules\Education\Rules\Entities\RuleModel;
use Modules\Education\Source\Entities\Source;
use Modules\Education\Source\Entities\SourceModel;
use Modules\Languages\Entities\Language;
use Modules\Languages\Entities\LanguageModel;
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
            Arr::get($morphs, Dictionary::class) => DictionaryModel::class,
            Arr::get($morphs, Container::class) => ContainerModel::class,
            Arr::get($morphs, Rule::class) => RuleModel::class,
        ]);
    }
}
