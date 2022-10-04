<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Entities;

use App\Base\Entity\EloquentHasDescription;
use App\Base\Entity\EloquentHasTitle;
use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Languages\Entities\EloquentLanguageRelation;
use Modules\Personal\User\Entities\EloquentUserRelation;

final class DictionaryModel extends Model implements Dictionary
{
    use EloquentId;
    use EloquentUserRelation;
    use EloquentLanguageRelation;
    use EloquentHasTitle;
    use EloquentHasDescription;
    use EloquentTimestamps;

    protected $table = 'dictionaries';
}
