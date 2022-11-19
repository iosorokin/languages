<?php

declare(strict_types=1);

namespace WIP\Personal\Authorization\Queries;

use App\Base\Model\Values\Identificatiors\Id\IntId;
use WIP\Personal\Authorization\Repositories\AuthorizationRepository;

final class AuthorizationQuery
{
    public function __construct(
        private AuthorizationRepository $repository,
    ) {}

    public function isRoot(IntId $id): bool
    {
        return $this->repository->isRoot($id);
    }
}
