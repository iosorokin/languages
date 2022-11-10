<?php

namespace Domain\Core\Language\Root\Repositories;

use Domain\Core\Language\Root\Model\Structures\RootLanguageStructure;

interface ManagerLanguageRepository
{
    public function add(RootLanguageStructure $language): int;

    public function update(RootLanguageStructure $language): void;

    public function find(int $id, array $attributes = []): ?RootLanguageStructure;

    /**
     * @param array<RootLanguageStructure> $attributes
     */
    public function get(array $attributes = []): array;

    public function delete(int $id): void;
}
