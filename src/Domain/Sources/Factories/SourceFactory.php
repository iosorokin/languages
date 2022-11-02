<?php

namespace Domain\Sources\Factories;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Domain\Sources\Enums\SourceType;
use Domain\Sources\Structures\Source;

class SourceFactory
{
    public function create(EloquentUserModel $user, LanguageModel $language, array $attributes): Source
    {
        $source = new Source();
        $source->user()->associate($user);
        $source->language()->associate($language);
        $source->title = $attributes['title'];
        $source->description = $attributes['description'];
        $source->type = SourceType::tryFrom($attributes['type']);

        return $source;
    }
}
