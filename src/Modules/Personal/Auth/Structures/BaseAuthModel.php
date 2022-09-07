<?php

namespace Modules\Personal\Auth\Structures;

use App\Contracts\Structures\Personal\BaseAuthStructure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class BaseAuthModel extends Model implements BaseAuthStructure
{
    protected $table = 'base_auths';

    public function authable(): MorphTo
    {
        return $this->morphTo();
    }
}
