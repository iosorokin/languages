<?php

declare(strict_types=1);

namespace Modules\Core\Sentences\Model;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Sources\Structures\HasSource;
use Modules\Internal\Container\Contracts\ContainerableElement;

final class Sentence extends Model implements ContainerableElement
{
    use IntId;
    use Timestamps;
    use HasSource;
}
