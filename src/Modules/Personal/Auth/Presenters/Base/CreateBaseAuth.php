<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters\Base;

use App\Contracts\Presenters\Personal\Auth\CreateBaseAuthPresenter;
use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\Personal\BaseAuthStructure;
use Modules\Personal\Auth\Dto\CreateBaseAuthDto;
use Modules\Personal\Auth\Factories\BaseAuthFactory;
use Modules\Personal\Auth\Structures\BaseAuthModel;

final class CreateBaseAuth implements CreateBaseAuthPresenter
{
    public function __construct(
        private BaseAuthFactory $factory,
    ) {}

    public function __invoke(AuthableStructure $authable, array $attributes): BaseAuthModel
    {
        $baseAuth = $this->factory->new($authable, $attributes);

        return $baseAuth;
    }
}
