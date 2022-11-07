<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Infrastructure\Repository;

use Domain\Core\Languages\Domain\Contexts\Language;
use Domain\Core\Languages\Domain\LanguageRepository;

final class EloquentLanguageRepository implements LanguageRepository
{
    public function add(Language $language): void
    {

    }
}
