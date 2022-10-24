<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Mixins;

use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Model\Language;
use Modules\Domain\Languages\Validators\CreateLanguageValidator;
use Modules\Personal\User\Model\User;

final class CreateLanguage
{
    public function __construct(
        private LanguageFactory $factory,
        private CreateLanguageValidator $validator,
    ) {}

    public function __invoke(User $user, array $attributes): Language
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->factory->create($user, $attributes);
        $language->save();

        return $language;
    }
}
