<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Structures;

use App\Base\Structures\Identify\IntId;
use App\Base\Structures\IsActiveAttributes;
use App\Base\Structures\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Personal\User\Structures\EloquentUserRelation;

final class LanguageModel extends Model implements Language
{
    use EloquentUserRelation;
    use IsActiveAttributes;
    use IntId;
    use LanguageAttributes;
    use Timestamps;
    use LanguageFillableAttributes;

    protected $table = 'languages';
}
