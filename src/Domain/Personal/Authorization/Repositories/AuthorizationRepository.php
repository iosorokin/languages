<?php

namespace Domain\Personal\Authorization\Repositories;

use App\Values\Identificatiors\Id\IntId;

interface AuthorizationRepository
{
    public function isRoot(IntId $id): bool;
}
