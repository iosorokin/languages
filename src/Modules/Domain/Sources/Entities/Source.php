<?php

namespace Modules\Domain\Sources\Entities;

use App\Base\Entity\HasDescription;
use App\Base\Entity\HasTitle;
use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Domain\Languages\Entities\HasLanguage;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Entites\HasContainer;
use Modules\Personal\User\Entities\HasUser;

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
