<?php

declare(strict_types=1);

namespace Domain\Core\Language\Guest\Support;

use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Base\Policy\CanShowToPublic;
use Domain\Core\Language\Guest\Control\Queries\GuestFindLanguage;
use Domain\Core\Language\Guest\Model\Aggregate\GuestLanguage;
use Domain\Core\Language\Guest\Repository\GuestLanguageRepository;

final class GuestGetLanguageOrFail
{
    public function __construct(
        private GuestLanguageRepository $repository,
        private CanShowToPublic         $canShowToStudent,
    ){}

    public function __invoke(GuestFindLanguage $query): GuestLanguage
    {
        $language = $this->repository->find($query);
        if (! $language) {
            throw new EntityNotFound('language_id', $query->code());
        }

        ($this->canShowToStudent)($language);

        return $language;
    }
}
