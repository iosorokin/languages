<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Actions;

use Modules\Core\Languages\Entities\Language;
use Modules\Core\Languages\Factories\LanguageFactory;
use Modules\Core\Languages\Repositories\LanguageRepository;
use Modules\Personal\User\Entities\User;

final class CreateLanguage
{
    public function __construct(
        private LanguageFactory $languageFactory,
        private LanguageRepository $repository,
    ) {}

    public function __invoke(User $user, array $attributes): Language
    {
        $language = $this->languageFactory->new($user, $attributes);
        $this->repository->save($language);

        return $language;
    }
}
