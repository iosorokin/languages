<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Structures;

use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\Personal\BaseAuthStructure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

final class BaseAuthModel extends Model implements BaseAuthStructure
{
    protected $table = 'base_auths';

    public function authable(): MorphTo
    {
        return $this->morphTo();
    }

    public function setAuthable(AuthableStructure $authable): static
    {
        $this->authable()->associate($authable);

        return $this;
    }

    public function getAuthable(): AuthableStructure
    {
        return $this->authable;
    }
}
