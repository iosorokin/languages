<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Presenters\Internal;

use Illuminate\Validation\ValidationException;
use Modules\Core\Languages\Entities\Language;
use Modules\Core\Languages\Repositories\LanguageRepository;

final class GetLanguage implements GetLanguagePresenter
{
    public function __construct(
        private LanguageRepository $repository
    ){}

    public function getOrThrowNotFound(int $id): Language
    {
        $language = $this->repository->get($id);
        abort_if(! $language, 404);

        return $language;
    }

    public function getOrThrowBadRequest(int $id): Language
    {
        $language = $this->repository->get($id);
        if (! $language) {
            throw ValidationException::withMessages([
                'language_id' => sprintf('Language with id %d not found', $id)
            ]);
        }

        return $language;
    }
}
