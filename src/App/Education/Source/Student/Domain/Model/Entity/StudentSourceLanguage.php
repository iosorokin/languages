<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Domain\Model\Entity;

use Core\Base\Model\Values\Identificatiors\Id\IntId;

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
