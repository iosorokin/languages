<?php

namespace Domain\Core\Language\Student\Repositories;

use Domain\Core\Language\Student\Model\Aggregates\Language;

interface StudentLanguageRepository
{
    public function addToFavorite(Language $language): void;

    public function removeFromFavorite(Language $language): void;
}
