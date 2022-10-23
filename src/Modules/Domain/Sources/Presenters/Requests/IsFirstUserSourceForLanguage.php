<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Requests;

use Modules\Domain\Sources\Factories\SourceFactory;
use Modules\Domain\Sources\Queries\SourceQueryManger;

final class IsFirstUserSourceForLanguage implements IsFirstUserSourceForLanguagePresenter
{
    public function __construct(
        private SourceQueryManger $queryManger,
        private SourceFactory $sourceFactory,
    ) {}

    public function __invoke(int $userId, int $languageId): bool
    {
        $query = $this->queryManger->isFirstUserSourceForLanguage($userId, $languageId);
        $count = $this->sourceFactory->repository()
            ->count($query);

        return $count <= 1;
    }
}
