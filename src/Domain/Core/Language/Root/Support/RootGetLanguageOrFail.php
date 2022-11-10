<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Support;

use App\Exceptions\EntityNotFound;
use App\Model\Values\Identificatiors\Id\IntId;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Repositories\RootLanguageRepository;

final class RootGetLanguageOrFail
{
    public function __construct(
        private RootLanguageRepository $repository,
    ){}

    public function __invoke(IntId|int $id): RootLanguage
    {
        $id = is_int($id) ? $id : $id->toInt();
        $language = $this->repository->find($id);
        if (! $language) {
            throw new EntityNotFound('language_id', $id);
        }

        return $language;
    }
}
