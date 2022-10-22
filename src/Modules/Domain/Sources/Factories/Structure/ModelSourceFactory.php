<?php

namespace Modules\Domain\Sources\Factories\Structure;

use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Structures\SourceModel;
use Modules\Personal\User\Structures\User;

class ModelSourceFactory implements SourceStructureFactory
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
