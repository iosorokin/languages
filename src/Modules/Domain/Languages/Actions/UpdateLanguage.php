<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Actions;

use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Validators\UpdateLanguageValidator;
use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\User\Presenters\Internal\GetUserPresenter;

final class UpdateLanguage
{
    public function __construct(
        private GetLanguagePresenter     $getLanguage,
        private GetUserPresenter         $getUser,
        private UpdateLanguageValidator  $validator,
        private LanguageFactory         $languageFactory,
    ) {}

    public function __invoke(Client $client, Language|int $language, array $attributes): void
    {
        $language = is_int($language) ? $this->getLanguage->getOrThrowNotFound($language) : $language;
        $attributes = $attributes + $language->fillableAttributes();
        $attributes = $this->validator->validate($attributes);
        $user = isset($attributes['user_id']) ? ($this->getUser)($attributes['user_id']) : null;
        $this->languageFactory->structure()
            ->update($language, $attributes, $user);
        $this->languageFactory->repository()
            ->save($language);
    }
}
