<?php

declare(strict_types=1);

namespace Modules\Languages\Presenters\Internal;

use Modules\Languages\Entity\Language;
use Modules\Languages\Repositories\LanguageRepository;

final class GetLanguage implements GetLanguagePresenter
{
    public function __construct(
        private LanguageRepository $repository
    ){}

    public function __invoke(int $id): Language
    {
        $language = $this->repository->get($id);
        abort_if(! $language, 404);

        return $language;
    }
}
