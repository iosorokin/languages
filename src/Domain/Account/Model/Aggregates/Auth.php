<?php

declare(strict_types=1);

namespace Domain\Account\Model\Aggregates;

use App\Values\Identificatiors\Id\IntId;
use Domain\Account\Model\Entities\Accesses\Accesses;
use Domain\Account\Model\Entities\Accesses\AccessValue;
use Domain\Account\Services\Auth\Auth;

final class Auth implements Auth
{
    public function __construct(
        private readonly IntId    $id,
        private readonly Accesses $accesses,
    ) {}

    public function id(): IntId
    {
        return $this->id;
    }

    public function isRoot(): bool
    {
        return $this->accesses->isEnable(AccessValue::Root);
    }

    public function isStudent(): bool
    {
        return $this->accesses->isEnable(AccessValue::Student);
    }
}
