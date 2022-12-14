<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Model;

use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasContainer
{
    public function container(): MorphOne
    {
        return $this->morphOne(Container::class, 'containerable');
    }
}
