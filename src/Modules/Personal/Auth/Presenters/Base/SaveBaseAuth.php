<?php

namespace Modules\Personal\Auth\Presenters\Base;

use App\Contracts\Presenters\Personal\Auth\SaveBaseAuthPresenter;
use App\Contracts\Structures\BaseAuthStructure;
use Modules\Personal\Auth\Repositories\BaseAuthRepository;

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
