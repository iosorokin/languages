<?php

namespace Modules\Personal\Employers\Dto;

use App\Structures\Personal\UserStructure;
use Modules\Personal\Employers\Enums\Position;

class CreateEmployerDto
{
    public function __construct(
        public readonly UserStructure $user,
        public readonly Position $position
    ) {}
}
