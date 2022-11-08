<?php

namespace Domain\Support\Authorization\Repositories;

use App\Values\Identificatiors\Id\IntId;

interface AuthorizationRepository
{
    public function isRoot(IntId $id): bool;
}
