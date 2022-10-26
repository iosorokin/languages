<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Mixins;

use App\Database\Personal\EloquentUserModel;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Model\Language;
use Modules\Domain\Languages\Presenters\Internal\GetLanguage;
use Modules\Domain\Languages\Validators\UpdateLanguageValidator;

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
