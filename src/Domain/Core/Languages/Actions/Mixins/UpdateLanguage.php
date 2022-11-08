<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Actions\Mixins;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Domain\Core\Languages\Factories\LanguageFactory;
use Domain\Core\Languages\Queries\GetLanguage;
use Domain\Core\Languages\Validators\UpdateLanguageValidator;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

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
