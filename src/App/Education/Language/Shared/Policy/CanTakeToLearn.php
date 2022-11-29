<?php

namespace App\Education\Language\Shared\Policy;

interface CanTakeToLearn
{
    public function __invoke(int $languageId): void;
}
