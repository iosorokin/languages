<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Aggregates;

use App\Values\Datetime\Timestamp;
use App\Values\Identificatiors\Id\IntId;
use App\Values\Language\Code\Code;
use App\Values\Language\Name\Name;
use App\Values\Language\NativeName\NativeName;
use App\Values\State\IsActive;

abstract class Language
{
    protected IntId              $id;
    protected IntId              $owner;
    protected Name               $name;
    protected NativeName         $nativeName;
    protected Code               $code;
    protected IsActive           $isActive;
    protected Timestamp $createdAt;

    public function id(): IntId
    {
        return clone $this->id;
    }

    public function owner(): IntId
    {
        return clone $this->owner;
    }

    public function isActive(): IsActive
    {
        return $this->isActive;
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

    public function createdAt(): Timestamp
    {
        return clone $this->createdAt;
    }
}
