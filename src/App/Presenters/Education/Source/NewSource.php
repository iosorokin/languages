<?php

namespace App\Presenters\Education\Source;

use App\Contracts\Language;
use Illuminate\Support\Arr;
use Modules\Education\Source\Dto\CreateSourceDto;

class NewSource
{
    public function __invoke(array $attributes)
    {
        $language = '';
        $dto = $this->createDto($language, $attributes);
    }

    private function createDto(Language $language, array $attributes): CreateSourceDto
    {
        return new CreateSourceDto(
            language: $language,
            title: Arr::get($attributes, 'title'),
            description: Arr::get($attributes, 'decription')
        );
    }
}
