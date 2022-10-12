<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Entities;

use App\Base\Entity\Identify\EntityIntId;
use App\Base\Entity\Timestamps\EntityTimestamps;
use Modules\Personal\User\Entities\EntityUserRelation;

final class LanguageEntity implements Language
{
    use EntityIntId;
    use EntityUserRelation;
    use EntityLanguageAttributes;
    use EntityTimestamps;
}
