<?php

namespace Domain\Core\Sources\Factories;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Domain\Core\Sources\Enums\SourceType;
use Domain\Core\Sources\Structures\Source;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

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
