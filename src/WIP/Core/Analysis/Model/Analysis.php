<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Model;

use Core\Base\Structure\EloquentHasDescription;
use Core\Base\Structure\Identify\IntId;
use Core\Base\Structure\Timestamps\Timestamps;
use App\Account\User\Database\Eloquent\Model\HasUser;
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
