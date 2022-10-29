<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Presenters\Mixins;

use Modules\Domain\Languages\Application\Presenters\Internal\GetLanguage;
use Modules\Domain\Languages\Application\Validators\UpdateLanguageValidator;
use Modules\Domain\Languages\Domain\Factories\LanguageFactory;
use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

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
