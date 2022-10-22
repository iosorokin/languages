<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Mixins;

use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Validators\CreateLanguageValidator;
use Modules\Personal\User\Structures\User;

final class CreateLanguage
{
    public function __construct(
        private CreateLanguageValidator $validator,
        private LanguageFactory         $languageFactory,
    ) {}

    public function __invoke(User $user, array $attributes): Language
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->languageFactory
            ->structure()
            ->create($user, $attributes);
        $this->languageFactory
            ->repository()
            ->save($language);

        return $language;
    }
}
