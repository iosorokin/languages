<?php

declare(strict_types=1);

namespace Domain\Core\Analysis\Model;

use App\Base\Structure\EloquentHasDescription;
use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Domain\Core\Sentences\Model\HasSentence;
use Domain\Account\User\Database\Eloquent\Model\HasUser;
use Illuminate\Database\Eloquent\Model;

final class Analysis extends Model
{
    use IntId;
    use EloquentHasDescription;
    use Timestamps;
    use HasSentence;
    use HasUser;

    protected $table = 'analysis';
}
