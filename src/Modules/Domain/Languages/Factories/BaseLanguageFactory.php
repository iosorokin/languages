<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories;

use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\User\Structures\User;

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
        $language->setUserId($attributes['user_id']);
        if ($user) $language->setUser($user);
        $this->fillAttributes($language, $attributes);

        return $language;
    }

    public function update(Language $language, array $attributes, ?User $user = null): Language
    {
        $this->fillAttributes($language, $attributes);
        if ($user) $language->setUser($user);

        return $language;
    }

    private function fillAttributes(Language $language, array $attributes): void
    {
        $isActive = (bool)($attributes['is_active'] ?? false);

        $language->setIsActive($isActive);
        $language->setName($attributes['name']);
        $language->setNativeName($attributes['native_name']);
        $language->setCode($attributes['code']);
    }

    abstract protected function createStructure(): Language;
}
