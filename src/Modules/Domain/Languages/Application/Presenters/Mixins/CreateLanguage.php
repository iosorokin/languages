<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Presenters\Mixins;

use Modules\Domain\Languages\Application\Validators\CreateLanguageValidator;
use Modules\Domain\Languages\Domain\Factories\LanguageFactory;
use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

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
