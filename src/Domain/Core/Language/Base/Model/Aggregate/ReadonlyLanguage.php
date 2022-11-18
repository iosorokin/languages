<?php

namespace Domain\Core\Language\Base\Model\Aggregate;

use App\Model\Values\Datetime\Timestamp;
use App\Model\Values\Identificatiors\Id\IntId;
use Domain\Core\Language\Base\Model\Value\Code\Code;
use Domain\Core\Language\Base\Model\Value\Name\Name;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeName;
use Domain\Core\Language\Base\Model\Value\Status\Status;

interface ReadonlyLanguage
{
    public function owner(): IntId;

    public function status(): Status;

    public function name(): Name;

    public function nativeName(): NativeName;

    public function code(): Code;

    public function createdAt(): Timestamp;
}
