<?php

declare(strict_types=1);

namespace Domain\Support\Authorization\Queries;

use App\Values\Identificatiors\Id\IntId;
use Domain\Support\Authorization\Repositories\AuthorizationRepository;

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
