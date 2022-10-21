<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Actions;

use Modules\Domain\Languages\Factories\Structure\LanguageStructureFactory;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Validators\CreateLanguageValidator;
use Modules\Personal\User\Structures\User;

final class CreateLanguage
{
    public function __construct(
        private CreateLanguageValidator  $validator,
        private LanguageStructureFactory $languageFactory,
        private LanguageRepository       $repository,
    ) {}

    public function __invoke(User $user, array $attributes): Language
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->languageFactory->create($user, $attributes);
        $this->repository->save($language);

        return $language;
    }
}
