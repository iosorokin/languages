<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\ContentManager;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguageFactory;
use Domain\Core\Language\Root\Repositories\ManagerLanguageRepository;

class CreateLanguageHandler
{
    public function __construct(
        private RootLanguageFactory       $factory,
        private ManagerLanguageRepository $repository,
    ) {}

    public function __invoke(ContentManager $manager, RootCreateLanguage $dto): int
    {
        $language = $this->factory->new($manager, $dto);
        $language->commit($this->repository);

        return $language->id()->toInt();
    }
}
