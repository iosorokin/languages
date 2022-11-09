<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Queries\Mixins;

use App\Exceptions\EntityNotFound;
use App\Values\Identificatiors\Id\IntId;
use Domain\Core\Languages\Model\Agregates\Language\Language;
use Domain\Core\Languages\Repositories\LanguageRepository;

final class GetLanguage
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function get(IntId $id): ?Language
    {
        return $this->repository->find($id->toInt());
    }

    public function getOrFail(IntId $id): Language
    {
        $language = $this->get($id);
        if (! $language) {
            throw new EntityNotFound('language_id', $id->toInt());
        }

        return $language;
    }
}
