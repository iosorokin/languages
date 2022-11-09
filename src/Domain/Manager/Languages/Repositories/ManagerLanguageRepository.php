<?php

namespace Domain\Manager\Languages\Repositories;

use Domain\Core\Languages\Model\Manager\Aggregates\Manager\ManagerLanguage;
use Domain\Core\Languages\Model\Manager\Collections\Languages;

interface ManagerLanguageRepository
{
    public function add(ManagerLanguage $language): int;

    public function update(ManagerLanguage $language): void;

    public function find(int $id, array $attributes = []): ?ManagerLanguage;

    public function get(array $attributes = []): Languages;

    public function delete(ManagerLanguage $language): void;
}
