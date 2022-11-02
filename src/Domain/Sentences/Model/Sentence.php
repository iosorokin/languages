<?php

declare(strict_types=1);

namespace Domain\Sentences\Model;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Domain\Sources\Structures\HasSource;
use Domain\Internal\Container\Contracts\ContainerableElement;

final class Sentence extends Model implements ContainerableElement
{
    use IntId;
    use Timestamps;
    use HasSource;
}
