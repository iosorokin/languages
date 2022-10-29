<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Presenters\Internal;

use Exception;
use Illuminate\Validation\ValidationException;
use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

final class GetLanguage
{
    public function get(int $id): LanguageModel
    {
        return LanguageModel::find($id);
    }

    public function getOrThrowNotFound(int $id): LanguageModel
    {
        $language = $this->get($id);
        abort_if(! $language, 404);

        return $language;
    }

    public function getOrThrowBadRequest(int $id): LanguageModel
    {
        $language = $this->get($id);
        if (! $language) {
            throw ValidationException::withMessages([
                'language_id' => $this->getMessage($id),
            ]);
        }

        return $language;
    }

    public function getOrThrowException(int $id): LanguageModel
    {
        $language = $this->get($id);
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
