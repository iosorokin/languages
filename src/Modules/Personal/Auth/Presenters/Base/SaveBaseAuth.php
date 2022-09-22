<?php

namespace Modules\Personal\Auth\Presenters\Base;

use Modules\Personal\Auth\Repositories\BaseAuthRepository;
use Modules\Personal\Auth\Structures\BaseAuthStructure;

final class SaveBaseAuth implements SaveBaseAuthPresenter
{
    public function __construct(
        private BaseAuthRepository $repository,
    ) {}

    public function __invoke(BaseAuthStructure $baseAuth): void
    {
        // todo проверить на существование в базе
        $this->repository->add($baseAuth);
    }
}
