<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\Root;
use Domain\Core\Language\Root\Model\Aggregates\LanguageFactory;
use Domain\Core\Language\Root\Repositories\LanguageRepository;

class CreateLanguageHandler
{
    public function __construct(
        private LanguageFactory    $factory,
        private LanguageRepository $repository,
    ) {}

    public function __invoke(Root $root, CreateLanguage $dto): int
    {
        $language = $this->factory->new($root, $dto);
        $language->commit($this->repository);

        return $language->id()->toInt();
    }
}
