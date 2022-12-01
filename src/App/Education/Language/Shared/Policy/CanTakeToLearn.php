<?php

namespace App\Education\Language\Shared\Policy;

use Core\Base\Model\Values\Identificatiors\Id\IntId;

interface CanTakeToLearn
{
    public function __invoke(IntId $languageId): void;
}
