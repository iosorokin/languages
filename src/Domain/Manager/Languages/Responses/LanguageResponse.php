<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Responses;

use App\Values\Datetime\Timestamp;
use App\Values\Identificatiors\Id\IntId;
use App\Values\Language\Code\Code;
use App\Values\Language\Name\Name;
use App\Values\Language\NativeName\NativeName;
use App\Values\State\IsActive;
use Domain\Core\Languages\Model\Manager\Aggregates\Manager\ManagerLanguage;

final class LanguageResponse
{
    public function __construct(
        private ManagerLanguage $language,
    ) {}

    public function id(): IntId
    {
        return clone $this->language->id();
    }

    public function name(): Name
    {
        return clone $this->language->name();
    }

    public function nativeName(): NativeName
    {
        return clone $this->language->nativeName();
    }

    public function code(): Code
    {
        return clone $this->language->code();
    }

    public function isActive(): IsActive
    {
        return clone $this->language->isActive();
    }

    public function createdAt(): Timestamp
    {
        return clone $this->language->createdAt();
    }
}
