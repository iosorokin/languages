<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Domain\Cases;

use App\Education\Source\Student\Domain\Cases\Dto\UpdateSourceDto;
use App\Education\Source\Student\Domain\Model\Aggregate\Source;

final class UpdateSourceHandler
{
    public function __invoke(UpdateSourceDto $dto): Source
    {

    }
}
