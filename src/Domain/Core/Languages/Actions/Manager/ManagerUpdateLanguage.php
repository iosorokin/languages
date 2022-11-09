<?php

namespace Domain\Core\Languages\Actions\Manager;

use App\Roles\ContentManager;
use App\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Languages\Actions\Manager\Dto\UpdateLanguageDto;
use Domain\Core\Languages\Queries\Mixins\GetLanguage;
use Domain\Core\Languages\Repositories\LanguageRepository;
use Domain\Core\Languages\Support\UpdateLanguage;

class ManagerUpdateLanguage
{
    public function __construct(
        private GetLanguage $getLanguage,
        private UpdateLanguage $updateLanguage,
        private LanguageRepository $repository,
    ) {}

    public function __invoke(ContentManager $manager, UpdateLanguageDto $dto): void
    {
        $id = BigIntId::new($dto->id());
        $language = $this->getLanguage->getOrFail($id);
        ($this->updateLanguage)($language, $dto);
        $this->repository->update($language);
    }
}
