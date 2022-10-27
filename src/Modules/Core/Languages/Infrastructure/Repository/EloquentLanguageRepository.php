<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Infrastructure\Repository;

use Modules\Core\Languages\Domain\Contexts\Language;
use Modules\Core\Languages\Domain\LanguageRepository;

final class EloquentLanguageRepository implements LanguageRepository
{
    public function add(Language $language): void
    {

    }
}
