<?php

namespace Modules\Domain\Sources\Structures;

use App\Base\Structures\HasDescription;
use App\Base\Structures\HasTitle;
use App\Base\Structures\Identify\HasIntId;
use App\Base\Structures\Timestamps\HasTimestamps;
use Modules\Domain\Languages\Structures\HasLanguage;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Structures\HasContainer;
use Modules\Personal\User\Structures\HasUser;

interface Source extends
    HasIntId,
    HasUser,
    HasLanguage,
    HasDescription,
    HasTitle,
    HasTimestamps,
    HasContainer,

    Containerable
{
    public function setType(SourceType $type): self;

    public function getType(): SourceType;
}
