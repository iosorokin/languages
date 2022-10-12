<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Actions;

use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Domain\Languages\Validators\CreateLanguageValidator;
use Modules\Personal\User\Entities\User;

final class CreateLanguage
{
    public function __construct(
        private CreateLanguageValidator $validator,
        private LanguageFactory         $languageFactory,
        private LanguageRepository      $repository,
    ) {}

    public function __invoke(User $user, array $attributes): Language
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->languageFactory->create($user, $attributes);
        $this->repository->save($language);

        return $language;
    }
}
