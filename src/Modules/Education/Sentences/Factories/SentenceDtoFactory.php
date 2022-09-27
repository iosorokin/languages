<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Factories;

use Illuminate\Support\Arr;
use Modules\Education\Sentences\Dto\CreateSentenceDto;
use Modules\Education\Sentences\Dto\UpdateSentenceDto;
use Modules\Education\Sentences\Validators\CreateSentenceValidator;
use Modules\Education\Sentences\Validators\UpdateSentenceValidator;

final class SentenceDtoFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function create(array $attributes): CreateSentenceDto
    {
        /** @var CreateSentenceValidator $validator */
        $validator = app(CreateSentenceValidator::class);
        $attributes = $validator->validate($attributes);
        $dto = new CreateSentenceDto();
        $dto->setContainerId($attributes['container_id']);
        $this->default($dto, $attributes);

        return $dto;
    }

    /**
     * @param array<mixed> $attributes
     */
    public function update(array $attributes): UpdateSentenceDto
    {
        /** @var UpdateSentenceValidator $validator */
        $validator = app(UpdateSentenceValidator::class);
        $attributes = $validator->validate($attributes);
        $dto = new UpdateSentenceDto();
        $this->default($dto, $attributes);

        return $dto;
    }

    /**
     * @param array<mixed> $attributes
     */
    private function default(CreateSentenceDto|UpdateSentenceDto $dto, array $attributes): void
    {
        $dto->setText($attributes['text']);
    }
}
