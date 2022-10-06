<?php

namespace Modules\Core\Sources\Entities;

use App\Base\Entity\HasDescription;
use App\Base\Entity\HasTitle;
use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Container\Contracts\Containerable;
use Modules\Container\Entites\HasContainer;
use Modules\Core\Languages\Entities\HasLanguage;
use Modules\Core\Sources\Enums\SourceType;
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
