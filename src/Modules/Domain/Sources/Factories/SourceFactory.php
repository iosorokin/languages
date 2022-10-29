<?php

namespace Modules\Domain\Sources\Factories;

use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Domain\Sources\Structures\Source;
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
