<?php

declare(strict_types=1);

namespace Modules\Languages\Presenters\Admin;

use Modules\Languages\Entities\Language;
use Modules\Languages\Factories\ModelLanguageFactory;
use Modules\Languages\Repositories\LanguageRepository;

class AdminGetLanguage implements AdminGetLanguagePresenter
{
    public function __construct(
        private LanguageRepository   $repository,
    ) {}

    public function __invoke(int $id): Language
    {
        $language = $this->repository->get($id);

        return $language;
    }
}
