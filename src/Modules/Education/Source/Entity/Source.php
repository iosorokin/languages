<?php

namespace Modules\Education\Source\Entity;

use App\Base\Entity\HasDescription;
use App\Base\Entity\HasTitle;
use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Container\Contracts\Containerable;
use Modules\Education\Source\Enums\SourceType;
use Modules\Languages\Entity\HasLanguage;
use Modules\Personal\User\Entities\HasUser;

interface Source extends
    HasIntId,
    HasUser,
    HasLanguage,
    HasDescription,
    HasTitle,
    HasTimestamps,

    Containerable
{
    public function setType(SourceType $type): self;

    public function getType(): SourceType;
}
