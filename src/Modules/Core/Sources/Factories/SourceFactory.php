<?php

namespace Modules\Core\Sources\Factories;

use Modules\Core\Languages\Infrastructure\Model\Language;
use Modules\Core\Sources\Enums\SourceType;
use Modules\Core\Sources\Structures\Source;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

class SourceFactory
{
    public function create(EloquentUserModel $user, Language $language, array $attributes): Source
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
