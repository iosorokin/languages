<?php

namespace Modules\Education\Rules\Entities;

use App\Base\Entity\HasDescription;
use App\Base\Entity\HasTitle;
use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Container\Contracts\ContainerableElement;
use Modules\Languages\Entities\HasLanguage;
use Modules\Personal\User\Entities\HasUser;

interface Rule extends
    HasIntId,
    HasUser,
    HasLanguage,
    HasTitle,
    HasDescription,
    HasTimestamps,

    ContainerableElement
{
}
