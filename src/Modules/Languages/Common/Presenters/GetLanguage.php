<?php

declare(strict_types=1);

namespace Modules\Languages\Common\Presenters;

use Modules\Languages\Common\Contracts\GetLanguagePresenter;
use Modules\Languages\Common\Contracts\LanguageStructure;
use Modules\Languages\Common\Enums\Language;
use Modules\Languages\Learning\Presenters\GetLearningLanguagePresenter;
use Modules\Languages\Real\Presenters\GetRealLanguagePresenter;

final class GetLanguage implements GetLanguagePresenter
{
    public function __invoke(int $id, string $type): LanguageStructure
    {
        $language = $this->validateAndReturnEnum($type);
        $concretePresenter = $this->createConcretePresenter($language);
        $language = $concretePresenter($id);

        return $language;
    }

    private function validateAndReturnEnum(string $type): Language
    {
        return Language::tryFrom($type);
    }

    private function createConcretePresenter(Language $language): GetRealLanguagePresenter|GetLearningLanguagePresenter
    {
        return match (true) {
            $language->isReal() => app(GetRealLanguagePresenter::class),
            $language->isLearning() => app(GetLearningLanguagePresenter::class)
        };
    }
}
