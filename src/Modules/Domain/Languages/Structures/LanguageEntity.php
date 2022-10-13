<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Structures;

use App\Base\Structures\EntityIsActive;
use App\Base\Structures\Identify\EntityIntId;
use App\Base\Structures\Timestamps\EntityTimestamps;
use App\Extensions\ToArray;
use Modules\Personal\User\Structures\EntityUserRelation;

final class LanguageEntity implements Language
{
    use EntityIntId;
    use EntityUserRelation;
    use EntityLanguageAttributes;
    use EntityTimestamps;
    use EntityIsActive;
    use LanguageFillableAttributes;
    use ToArray;
}