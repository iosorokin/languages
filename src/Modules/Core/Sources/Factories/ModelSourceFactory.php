<?php

namespace Modules\Core\Sources\Factories;

use Modules\Core\Languages\Entities\Language;
use Modules\Core\Sources\Entities\Source;
use Modules\Core\Sources\Entities\SourceModel;
use Modules\Core\Sources\Enums\SourceType;
use Modules\Personal\User\Entities\User;

class ModelSourceFactory implements SourceFactory
{
    public function new(User $user, Language $language, array $attributes): Source
    {
        $source = new SourceModel();
        $source->setUser($user);
        $source->setLanguage($language);
        $source->setTitle($attributes['title']);
        $source->setDescription($attributes['description']);
        $source->setType(SourceType::tryFrom($attributes['type']));

        return $source;
    }
}
