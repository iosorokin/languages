<?php

declare(strict_types=1);

namespace Domain\Languages\Application\Presenters\Mixins;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Languages\Application\Validators\CreateLanguageValidator;
use Domain\Languages\Domain\Factories\LanguageFactory;
use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

final class CreateLanguage
{
    public function __construct(
        private LanguageFactory $factory,
        private CreateLanguageValidator $validator,
    ) {}

    public function __invoke(EloquentUserModel $user, array $attributes): LanguageModel
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->factory->create($user, $attributes);
        $language->save();

        return $language;
    }
}
