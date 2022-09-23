<?php

namespace Modules\Container\Structures;

use Illuminate\Support\Carbon;
use Modules\Container\Contracts\ContainerableElement;

/**
 * @property int $id
 * @property int $container_id
 * @property string $element_type
 * @property string $element_id
 * @property int $position
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
interface ContainerElementStructure
{
    public function setContainer(ContainerStructure $container): self;

    public function getContainer(): ContainerStructure;

    public function setElement(ContainerableElement $element): self;

    public function getElement(): ContainerableElement;
}
