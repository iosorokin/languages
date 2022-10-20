<?php

namespace Modules\Domain\Sources\Structures;

use App\Base\Structure\HasDescription;
use App\Base\Structure\HasTitle;
use App\Base\Structure\Identify\HasIntId;
use App\Base\Structure\Timestamps\HasTimestamps;
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
