<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Guest;

use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Repositories\LanguageRepository;

final class GuestShowLanguage implements GuestShowLanguagePresenter
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
