<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Model\Aggregates;

use App\Model\Values\Identificatiors\Id\IntId;
use App\Model\Values\Language\Code\Code;
use App\Model\Values\Language\Name\Name;
use App\Model\Values\Language\NativeName\NativeName;
use App\Model\Values\State\IsActive;
use Domain\Core\Language\Student\Model\Values\Learning\IsLearning;

final class Language
{
    public function __construct(
        private IntId      $student,
        private IntId      $language,
        private IsLearning $isLearning,
        private Name       $name,
        private NativeName $nativeName,
        private Code       $code,
    ) {}

    public function student(): IntId
    {
        return $this->student;
    }

    public function language(): IntId
    {
        return $this->language;
    }

    public function isLearning(): IsLearning
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
}
