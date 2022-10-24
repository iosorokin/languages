<?php

namespace Modules\Internal\Container\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface Containerable
{
    public function container(): MorphOne;
}
