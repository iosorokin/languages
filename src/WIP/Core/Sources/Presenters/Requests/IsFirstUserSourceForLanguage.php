<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Presenters\Requests;

use WIP\Core\Sources\Queries\SourceQueryManger;

final class IsFirstUserSourceForLanguage
{
    public function __construct(
        private SourceQueryManger $queryManger,
    ) {}

    public function __invoke(int $userId, int $languageId): bool
    {
        $query = $this->queryManger->isFirstUserSourceForLanguage($userId, $languageId);
        $count = $query->count();

        return $count <= 1;
    }
}
