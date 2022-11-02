<?php

declare(strict_types=1);

namespace Domain\Languages\Application\Presenters\Mixins;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Languages\Application\Presenters\Internal\GetLanguage;
use Domain\Languages\Application\Validators\UpdateLanguageValidator;
use Domain\Languages\Domain\Factories\LanguageFactory;
use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

final class UpdateLanguage
{
    public function __construct(
        private GetLanguage    $getLanguage,
        private UpdateLanguageValidator $validator,
        private LanguageFactory  $languageFactory,
    ) {}

    public function __invoke(EloquentUserModel $user, LanguageModel|int $language, array $attributes): void
    {
        $language = is_int($language) ? $this->getLanguage->getOrThrowNotFound($language) : $language;
        $attributes = $attributes + $language->toArray();
        $attributes = $this->validator->validate($attributes);
        $this->languageFactory->update($language, $attributes);
        $language->save();
    }
}
