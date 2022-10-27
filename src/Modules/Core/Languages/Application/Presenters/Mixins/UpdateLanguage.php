<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Presenters\Mixins;

use Modules\Core\Languages\Application\Presenters\Internal\GetLanguage;
use Modules\Core\Languages\Application\Validators\UpdateLanguageValidator;
use Modules\Core\Languages\Domain\Factories\LanguageFactory;
use Modules\Core\Languages\Infrastructure\Model\Language;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

final class UpdateLanguage
{
    public function __construct(
        private GetLanguage    $getLanguage,
        private UpdateLanguageValidator $validator,
        private LanguageFactory  $languageFactory,
    ) {}

    public function __invoke(EloquentUserModel $user, Language|int $language, array $attributes): void
    {
        $language = is_int($language) ? $this->getLanguage->getOrThrowNotFound($language) : $language;
        $attributes = $attributes + $language->toArray();
        $attributes = $this->validator->validate($attributes);
        $this->languageFactory->update($language, $attributes);
        $language->save();
    }
}
