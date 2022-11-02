<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Accesses;

use App\Values\BaseInvalidValueObject;
use App\Values\InvalidValueObject;

final class InvalidAccessesObject extends BaseInvalidValueObject implements Accesses, InvalidValueObject
{
    public function isRoot(): bool
    {
        // TODO: Implement isRoot() method.
    }

    public function isAdmin(): bool
    {
        // TODO: Implement isAdmin() method.
    }

    public function isUser(): bool
    {
        // TODO: Implement isUser() method.
    }

    public function addAccess(Access|string $access): Accesses
    {
        // TODO: Implement addAccess() method.
    }

    public function deleteAccess(Access|string $access): Accesses
    {
        // TODO: Implement deleteAccess() method.
    }
}
