<?php

declare(strict_types=1);

namespace Modules\Languages\Real\Presenters;

use Modules\Languages\Real\Factories\RealLanguageFactory;
use Modules\Languages\Real\Repositories\RealLanguageRepository;
use Modules\Languages\Real\Structures\RealLanguageStructure;

class GetRealLanguage implements GetRealLanguagePresenter
{
    public function __construct(
        private RealLanguageRepository $repository,
        private RealLanguageFactory $factory,
    ) {}

    public function __invoke(int $id): RealLanguageStructure
    {
        $structure = $this->repository->get($id);
        $context = $this->factory->restore($structure);

        return $context->structure;
    }
}
