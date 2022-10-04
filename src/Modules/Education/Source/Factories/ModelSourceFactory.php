<?php

namespace Modules\Education\Source\Factories;

use Modules\Education\Source\Entities\Source;
use Modules\Education\Source\Entities\SourceModel;
use Modules\Education\Source\Enums\SourceType;
use Modules\Languages\Entities\Language;
use Modules\Personal\User\Entities\User;

class ModelSourceFactory implements SourceFactory
{
    public function new(User $user, Language $language, array $attributes): Source
    {
        $source = new SourceModel();
        $source->setUser($user);
        $source->setLanguage($language);
        $source->setTitle($attributes['type']);
        $source->setDescription($attributes['description']);
        $source->setType(SourceType::tryFrom($attributes['type']));

        return $source;
    }
}
