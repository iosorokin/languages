<?php

namespace Modules\Core\Sources\Factories;

use Modules\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Modules\Core\Sources\Enums\SourceType;
use Modules\Core\Sources\Structures\Source;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

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
