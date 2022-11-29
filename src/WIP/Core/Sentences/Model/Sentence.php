<?php

declare(strict_types=1);

namespace WIP\Core\Sentences\Model;

use Core\Base\Structure\Identify\IntId;
use Core\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use WIP\Core\Sources\Structures\HasSource;
use WIP\Internal\Container\Contracts\ContainerableElement;

final class Sentence extends Model implements ContainerableElement
{
    use IntId;
    use Timestamps;
    use HasSource;
}
