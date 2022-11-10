<?php

namespace Domain\Core\Language\Root\Repositories;

use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Model\Collections\RootLanguages;

interface RootLanguageRepository
{
    public function add(RootLanguage $language): int;

    public function update(RootLanguage $language): void;

    public function find(int $id, array $attributes = []): ?RootLanguage;

    public function get(array $attributes = []): RootLanguages;

    public function delete(int $id): void;
}
