<?php

namespace Modules\Education\Dictionary\Entities;

use App\Base\Entity\HasDescription;
use App\Base\Entity\HasTitle;
use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Container\Contracts\Containerable;
use Modules\Container\Entites\HasContainer;
use Modules\Languages\Entities\HasLanguage;
use Modules\Personal\User\Entities\HasUser;

interface Dictionary extends
    HasIntId,
    HasUser,
    HasLanguage,
    HasTitle,
    HasDescription,
    HasTimestamps,
    HasContainer,

    Containerable
{

}
