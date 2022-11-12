<?php

namespace WIP\Core\Sources\Factories;

use Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Sources\Enums\SourceType;
use WIP\Core\Sources\Structures\Source;

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
