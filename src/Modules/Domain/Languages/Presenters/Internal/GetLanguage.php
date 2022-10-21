<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Internal;

use Exception;
use Illuminate\Validation\ValidationException;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Repositories\LanguageRepository;

final class GetLanguage implements GetLanguagePresenter
{
    public function __construct(
        private LanguageFactory $factory
    ){}

    public function getOrThrowNotFound(int $id): Language
    {
        $language = $this->factory
            ->repository()
            ->get($id);
        abort_if(! $language, 404);

        return $language;
    }

    public function getOrThrowBadRequest(int $id): Language
    {
        $language = $this->factory
            ->repository()
            ->get($id);
        if (! $language) {
            throw ValidationException::withMessages([
                'language_id' => $this->getMessage($id),
            ]);
        }

        return $language;
    }

    public function getOrThrowException(int $id): Language
    {
        $language = $this->factory
            ->repository()
            ->get($id);
        if (! $language) {
            throw new Exception($this->getMessage($id));
        }

        return $language;
    }

    private function getMessage(int $id): string
    {
        return sprintf('Language with id %d not found', $id);
    }
}
