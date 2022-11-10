<?php

namespace Domain\Core\Language\Root\Repositories;

use Domain\Core\Language\Root\Model\Aggregates\Language;
use Domain\Core\Language\Root\Model\Collections\Languages;

interface LanguageRepository
{
    public function add(Language $language): int;

    public function update(Language $language): void;

    public function find(int $id, array $attributes = []): ?Language;

    public function get(array $attributes = []): Languages;

    public function delete(int $id): void;
}
