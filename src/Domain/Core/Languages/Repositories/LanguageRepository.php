<?php

namespace Domain\Core\Languages\Repositories;

use Domain\Core\Languages\Model\Agregates\Language\Language;
use Domain\Core\Languages\Model\Collections\Languages;

interface LanguageRepository
{
    public function add(Language $language): int;

    public function update(Language $language): void;

    public function find(int $id): ?Language;

    public function delete(Language $language): void;

    public function managerIndex(): Languages;
}
