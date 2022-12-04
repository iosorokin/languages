<?php

declare(strict_types=1);

namespace Domain\Education\Language\Base\Model\Aggregate;

use Core\Base\Model\Entity;
use Core\Base\Model\Values\Datetime\Timestamp;
use Core\Base\Model\Values\Identificatiors\Id\IntId;
use Domain\Education\Language\Base\Model\Value\Code\Code;
use Domain\Education\Language\Base\Model\Value\Name\Name;
use Domain\Education\Language\Base\Model\Value\NativeName\NativeName;
use Domain\Education\Language\Base\Model\Value\Status\Status;
use Domain\Education\Language\Base\Model\Value\Status\StatusImp;

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
}
