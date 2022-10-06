<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Presenters\Admin;

use Modules\Core\Languages\Entities\Language;
use Modules\Core\Languages\Repositories\LanguageRepository;

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
