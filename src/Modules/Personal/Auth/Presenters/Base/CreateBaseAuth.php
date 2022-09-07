<?php

namespace Modules\Personal\Auth\Presenters\Base;

use App\Contracts\Presenters\Personal\Auth\CreateBaseAuthPresenter;
use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\Personal\BaseAuthStructure;
use Modules\Personal\Auth\Dto\CreateBaseAuthDto;
use Modules\Personal\Auth\Factories\BaseAuthFactory;
use Modules\Personal\Auth\Repositories\BaseAuthRepository;

class CreateBaseAuth implements CreateBaseAuthPresenter
{
    public function __construct(
        private BaseAuthFactory $factory,
        private BaseAuthRepository $baseAuthRepository,
    ) {}

    public function __invoke(AuthableStructure $authable, array $attributes): BaseAuthStructure
    {
        $dto = new CreateBaseAuthDto($authable, $attributes);
        $baseAuth = $this->factory->new($dto);
        $structure = $baseAuth->structure;
        // todo проверить на существование в базе
        $this->baseAuthRepository->add($structure);
        $authable->setBaseAuth($structure);

        return $structure;
    }
}
