<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters\Base;

use App\Contracts\Presenters\Personal\Auth\CreateBaseAuthPresenter;
use Modules\Personal\Auth\Factories\BaseAuthFactory;
use Modules\Personal\Auth\Structures\BaseAuthModel;

final class CreateBaseAuth implements CreateBaseAuthPresenter
{
    public function __construct(
        private BaseAuthFactory $factory,
    ) {}

    public function __invoke(array $attributes): BaseAuthModel
    {
        $baseAuth = $this->factory->new($attributes);

        return $baseAuth;
    }
}
