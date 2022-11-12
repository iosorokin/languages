<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\Root;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguageFactory;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;

class RootCreateLanguageHandler
{
    public function __construct(
        private RootLanguageFactory    $factory,
        private RootLanguageRepository $repository,
    ) {}

    public function __invoke(Root $root, RootCreateLanguage $dto): int
    {
        $language = $this->factory->new($root, $dto);
        $language->commit($this->repository);

        return $language->id()->toInt();
    }
}
