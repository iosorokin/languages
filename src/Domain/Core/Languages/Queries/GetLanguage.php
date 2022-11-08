<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Queries;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use App\Repositories\Eloquent\Language\LanguageRepository;
use App\Values\Identificatiors\Id\IntId;
use Domain\Core\Languages\Model\Agregates\Language\Language;
use Exception;
use Illuminate\Validation\ValidationException;

final class GetLanguage
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function get(IntId $id): Language
    {
        return $this->repository->find($id);
    }

    public function getOrThrowNotFound(IntId $id): Language
    {
        $language = $this->get($id);
        abort_if(! $language, 404);

        return $language;
    }

    public function getOrThrowBadRequest(IntId $id): Language
    {
        $language = $this->get($id);
        if (! $language) {
            throw ValidationException::withMessages([
                'language_id' => $this->getMessage($id->toInt()),
            ]);
        }

        return $language;
    }

    public function getOrThrowException(IntId $id): Language
    {
        $language = $this->get($id);
        if (! $language) {
            throw new Exception($this->getMessage($id->toInt()));
        }

        return $language;
    }

    private function getMessage(int $id): string
    {
        return sprintf('Language with id %d not found', $id);
    }
}
