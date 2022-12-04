<?php

declare(strict_types=1);

namespace Domain\Education\Source\Student\Domain\Cases;

use Domain\Education\Source\Student\Domain\Cases\Dto\UpdateSourceDto;
use Domain\Education\Source\Student\Domain\Model\Aggregate\Source;

final class UpdateSourceHandler
{
    public function __invoke(UpdateSourceDto $dto): Source
    {

    }
}
