<?php

namespace Domain\Core\Languages\Model\Manager\Commands\Manager;

use App\Roles\ContentManager;
use Domain\Core\Languages\Model\Manager\Aggregates\Manager\LanguageFactory;
use Domain\Core\Languages\Model\Manager\ManagerLanguageRepository;

class ManagerCreateLanguageHandler
{
    public function __construct(
        private LanguageFactory           $factory,
        private ManagerLanguageRepository $repository,
    ) {}

    public function __invoke(ContentManager $manager, CreateLanguage $dto): int
    {
        $owner = $manager->id();
        $language = $this->factory->new($owner, $dto);
        $language->commit($this->repository);

        return $language->id()->toInt();
    }
}
