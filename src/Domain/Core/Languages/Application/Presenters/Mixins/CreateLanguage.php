<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Application\Presenters\Mixins;

use Domain\Core\Languages\Application\Validators\CreateLanguageValidator;
use Domain\Core\Languages\Domain\Factories\LanguageFactory;
use Domain\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

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
