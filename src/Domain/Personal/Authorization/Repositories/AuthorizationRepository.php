<?php

namespace Domain\Personal\Authorization\Repositories;

use App\Model\Values\Identificatiors\Id\IntId;

interface AuthorizationRepository
{
    public function isRoot(IntId $id): bool;
}
