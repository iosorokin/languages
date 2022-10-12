<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories;

use Modules\Domain\Languages\Entities\Language;
use Modules\Personal\User\Entities\User;

abstract class BaseLanguageFactory implements LanguageFactory
{
    public function create(User $user, array $attributes): Language
    {
        $language = $this->createStructure();
        $language->setUser($user);
        $this->fillAttributes($language, $attributes);

        return $language;
    }

    public function restore(array $attributes, ?User $user = null): Language
    {
        $language = $this->createStructure();
        $language->setId($attributes['id']);
        if ($user) $language->setUser($user);
        $this->fillAttributes($language, $attributes);

        return $language;
    }


    private function fillAttributes(Language $language, array $attributes): void
    {
        $language->setName($attributes['name']);
        $language->setNativeName($attributes['native_name']);
        $language->setCode($attributes['code']);
    }

    abstract protected function createStructure(): Language;
}
