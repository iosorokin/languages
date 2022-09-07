<?php

namespace Modules\Education\Source\Dto;

use App\Contracts\Language;

class CreateSourceDto
{
    public function __construct(
        public readonly ?Language $language,
        public readonly ?string $title,
        public readonly ?string $description,
    ) {}
}
