<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Queries\Mixins;

use App\Exceptions\EntityNotFound;
use Domain\Core\Languages\Model\Manager\Aggregates\Manager\ManagerLanguage;
use Domain\Core\Languages\Model\Manager\ManagerLanguageRepository;

final class GetLanguage
{
    public function __construct(
        private ManagerLanguageRepository $repository,
    ) {}

    public function get(int $id): ?ManagerLanguage
    {
        return $this->repository->find($id);
    }

    public function getOrFail(int $id): ManagerLanguage
    {
        $language = $this->get($id);
        if (! $language) {
            throw new EntityNotFound('language_id', $id);
        }

        return $language;
    }
}
