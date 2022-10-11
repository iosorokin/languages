<?php

namespace Modules\Domain\Languages\Entities;

use App\Base\Entity\Identify\IntId;
use App\Base\Entity\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Personal\User\Entities\EloquentUserRelation;

class LanguageModel extends Model implements Language
{
    use EloquentUserRelation;
    use IntId;
    use LanguageAttributes;
    use Timestamps;

    protected $table = 'languages';
}
