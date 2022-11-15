<?php

declare(strict_types=1);

namespace Domain\Student\Core\Language\Model\Aggregates;

use App\Model\Values\Identificatiors\Id\IntId;
use App\Model\Values\Language\Code\Code;
use App\Model\Values\Language\Name\Name;
use App\Model\Values\Language\NativeName\NativeName;

final class StudentLanguage
{
    public function __construct(
        private IntId      $student,
        private IntId      $id,
        private bool       $isLearning,
        private Name       $name,
        private NativeName $nativeName,
        private Code       $code,
        private bool       $isActive,
    ) {}

    public function student(): IntId
    {
        return clone $this->student;
    }

    public function id(): IntId
    {
        return clone $this->id;
    }

    public function isLearning(): bool
    {
        return $this->isLearning;
    }

    public function name(): Name
    {
        return clone $this->name;
    }

    public function nativeName(): NativeName
    {
        return clone $this->nativeName;
    }

    public function code(): Code
    {
        return clone $this->code;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }
}
