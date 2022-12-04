<?php

declare(strict_types=1);

namespace Presentation\Presenters\Education\Language;

use Domain\Education\Language\Base\Repository\LanguageRepository;
use Core\Base\Request\RequestData;
use Core\Contracts\View;

final class DeleteLanguagePresenter
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(RequestData $request, View $view): void
    {
        $languageId = $request->get('language_id');
    }
}
