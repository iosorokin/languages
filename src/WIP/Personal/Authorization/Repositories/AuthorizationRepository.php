<?php

namespace WIP\Personal\Authorization\Repositories;

use Core\Base\Model\Values\Identificatiors\Id\IntId;

interface AuthorizationRepository
{
    public function isRoot(IntId $id): bool;
}
