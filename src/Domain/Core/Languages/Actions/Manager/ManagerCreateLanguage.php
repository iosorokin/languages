<?php

namespace Domain\Core\Languages\Actions\Manager;

use App\Roles\ContentManager;
use Domain\Core\Languages\Actions\Manager\Dto\CreateLanguageDto;
use Domain\Core\Languages\Model\Agregates\Language\LanguageFactory;
use Domain\Core\Languages\Repositories\LanguageRepository;

class ManagerCreateLanguage
{
    public function __construct(
        private LanguageFactory $factory,
        private LanguageRepository $repository,
    ) {}

    public function __invoke(ContentManager $manager, CreateLanguageDto $dto): int
    {
        $owner = $manager->id();
        $language = $this->factory->new($owner, $dto);
        $language->commit($this->repository);

        return $language->id()->toInt();
    }
}
