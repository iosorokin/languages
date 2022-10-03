<?php

namespace Modules\Container\Entites;

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
interface ContainerElement
{
    public function setContainer(Container $container): self;

    public function getContainer(): Container;

    public function setElement(ContainerableElement $element): self;

    public function getElement(): ContainerableElement;
}
