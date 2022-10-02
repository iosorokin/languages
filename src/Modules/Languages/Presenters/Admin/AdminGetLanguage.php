<?php

declare(strict_types=1);

namespace Modules\Languages\Presenters\Admin;

use Modules\Languages\Entity\Language;
use Modules\Languages\Factories\ModelLanguageFactory;
use Modules\Languages\Repositories\LanguageRepository;

class AdminGetLanguage implements AdminGetLanguagePresenter
{
    public function __construct(
        private LanguageRepository   $repository,
        private ModelLanguageFactory $factory,
    ) {}

    public function __invoke(int $id): Language
    {
        $structure = $this->repository->get($id);
        $context = $this->factory->restore($structure);

        return $context->structure;
    }
}
