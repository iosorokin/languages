<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Entities;

use App\Base\Entity\Identify\IntId;
use App\Base\Entity\Timestamps\Timestamps;
use Modules\Personal\User\Entities\EntityUserRelation;
use Modules\Personal\User\Entities\User;

final class LanguageEntity implements Language
{
    use IntId;
    use EntityUserRelation;
    use LanguageAttributes;
    use Timestamps;
}
