<?php

namespace Modules\Personal\Auth\Actions\Base;

use App\Structures\Personal\BaseAuthStructure;
use Modules\Personal\Auth\Dto\CreateBaseAuthDto;
use Modules\Personal\Auth\Factories\BaseAuthFactory;

class CreateBaseAuth
{
    public function __construct(
        private BaseAuthFactory $factory,
    ) {}

    public function __invoke(CreateBaseAuthDto $dto): BaseAuthStructure
    {
        $baseAuth = $this->factory->new($dto);

        return $baseAuth->structure;
    }
}
