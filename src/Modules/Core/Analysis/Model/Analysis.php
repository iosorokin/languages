<?php

declare(strict_types=1);

namespace Modules\Core\Analysis\Model;

use App\Base\Structure\EloquentHasDescription;
use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Sentences\Model\HasSentence;
use Modules\Personal\User\Database\Eloquent\Model\HasUser;

final class Analysis extends Model
{
    use IntId;
    use EloquentHasDescription;
    use Timestamps;
    use HasSentence;
    use HasUser;

    protected $table = 'analysis';
}
