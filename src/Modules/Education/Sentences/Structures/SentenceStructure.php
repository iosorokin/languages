<?php

namespace Modules\Education\Sentences\Structures;

use Illuminate\Support\Carbon;
use Modules\Container\Structures\ContainerStructure;

/**
 * @property int $id
 * @property int $container_id
 * @property string $text
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
interface SentenceStructure
{
    public function setContainer(ContainerStructure $container): self;

    public function getContainer(): ContainerStructure;
}
