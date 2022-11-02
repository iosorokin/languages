<?php

declare(strict_types=1);

namespace Domain\Languages\Infrastructure\Repository;

use Domain\Languages\Domain\Contexts\Language;
use Domain\Languages\Domain\LanguageRepository;

final class EloquentLanguageRepository implements LanguageRepository
{
    public function add(Language $language): void
    {

    }
}
