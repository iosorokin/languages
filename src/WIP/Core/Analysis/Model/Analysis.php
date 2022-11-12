<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Model;

use App\Base\Structure\EloquentHasDescription;
use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Domain\Account\User\Database\Eloquent\Model\HasUser;
use Illuminate\Database\Eloquent\Model;
use WIP\Core\Sentences\Model\HasSentence;

final class Analysis extends Model
{
    use IntId;
    use EloquentHasDescription;
    use Timestamps;
    use HasSentence;
    use HasUser;

    protected $table = 'analysis';
}
