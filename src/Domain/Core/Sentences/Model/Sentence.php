<?php

declare(strict_types=1);

namespace Domain\Core\Sentences\Model;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Domain\Core\Sources\Structures\HasSource;
use Domain\Internal\Container\Contracts\ContainerableElement;
use Illuminate\Database\Eloquent\Model;

final class Sentence extends Model implements ContainerableElement
{
    use IntId;
    use Timestamps;
    use HasSource;
}
