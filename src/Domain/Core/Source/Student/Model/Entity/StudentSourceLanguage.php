<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Model\Entity;

use App\Model\Values\Identificatiors\Id\IntId;

final class StudentSourceLanguage
{
    public function __construct(
        private IntId $id,
        private bool $isActive,
    ) {}

    public function id(): IntId
    {
        return $this->id;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }
}
