<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Entities;

use App\Values\Identificatiors\Id\IntId;

final class LanguageOwner
{
    public function __construct(
        private IntId $id,
    ) {}

    public function id(): IntId
    {
        return $this->id;
    }
}
