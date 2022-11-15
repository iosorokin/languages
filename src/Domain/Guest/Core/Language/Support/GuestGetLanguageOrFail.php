<?php

declare(strict_types=1);

namespace Domain\Guest\Core\Language\Support;

use App\Exceptions\EntityNotFound;
use Domain\Base\Core\Language\Policy\CanShowToPublic;
use Domain\Guest\Core\Language\Control\Queries\GuestFindLanguage;
use Domain\Guest\Core\Language\Model\Aggregate\GuestLanguage;
use Domain\Guest\Core\Language\Repository\GuestLanguageRepository;

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
