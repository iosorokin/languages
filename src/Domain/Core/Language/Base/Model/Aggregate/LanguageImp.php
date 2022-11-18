<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Aggregate;

use App\Base\Model\Entity;
use App\Model\Values\Datetime\Timestamp;
use App\Model\Values\Identificatiors\Id\IntId;
use Domain\Core\Language\Base\Model\Value\Code\Code;
use Domain\Core\Language\Base\Model\Value\Name\Name;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeName;
use Domain\Core\Language\Base\Model\Value\Status\Status;
use Domain\Core\Language\Base\Model\Value\Status\StatusImp;

class LanguageImp extends Entity implements Language
{
    public function __construct(
        protected Code       $code,
        protected IntId      $owner,
        protected Name       $name,
        protected NativeName $nativeName,
        protected Status     $status,
        protected Timestamp  $createdAt,
    ) {}

    public function owner(): IntId
    {
        return $this->owner;
    }

    public function status(): Status
    {
        return $this->status;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function nativeName(): NativeName
    {
        return $this->nativeName;
    }

    public function code(): Code
    {
        return $this->code;
    }

    public function createdAt(): Timestamp
    {
        return $this->createdAt;
    }

    public function changeName(Name $name): self
    {
        if (! $this->name->compare($name)) {
            $this->name = $name;
        }

        return $this;
    }

    public function changeNativeName(NativeName $name): self
    {
        if (! $this->nativeName->compare($name)) {
            $this->nativeName = $name;
        }

        return $this;
    }

    public function changeCode(Code $code): self
    {
        if (! $this->code->compare($code)) {
            $this->code = $code;
        }

        return $this;
    }

    public function activate(): self
    {
        $new = StatusImp::active();
        if (! $this->status->compare($new)) {
            $this->status = $new;
        }

        return $this;
    }

    public function draft(): self
    {
        $new = StatusImp::draft();
        if (! $this->status->compare($new)) {
            $this->status = $new;
        }

        return $this;
    }
}
