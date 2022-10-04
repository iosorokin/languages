<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Entities;

use App\Base\Entity\EloquentHasDescription;
use App\Base\Entity\EloquentHasTitle;
use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Languages\Entities\EloquentLanguageRelation;
use Modules\Personal\User\Entities\EloquentUserRelation;

final class RuleModel extends Model implements Rule
{
    use EloquentId;
    use EloquentUserRelation;
    use EloquentLanguageRelation;
    use EloquentHasTitle;
    use EloquentHasDescription;
    use EloquentTimestamps;

    protected $table = 'rules';
}
