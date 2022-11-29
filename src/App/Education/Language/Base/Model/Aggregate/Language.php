<?php

namespace App\Education\Language\Base\Model\Aggregate;

use Core\Base\Model\Values\Datetime\Timestamp;
use Core\Base\Model\Values\Identificatiors\Id\IntId;
use App\Education\Language\Base\Model\Value\Code\Code;
use App\Education\Language\Base\Model\Value\Name\Name;
use App\Education\Language\Base\Model\Value\NativeName\NativeName;
use App\Education\Language\Base\Model\Value\Status\Status;

interface Language
{
    public function code(): Code;

    public function owner(): IntId;

    public function status(): Status;

    public function name(): Name;

    public function nativeName(): NativeName;

    public function createdAt(): Timestamp;
}
