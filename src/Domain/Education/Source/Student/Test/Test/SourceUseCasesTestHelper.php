<?php

declare(strict_types=1);

namespace Domain\Education\Source\Student\Test\Test;

use Domain\Controll\Source\Student\CreateSourceImp;
use Domain\Controll\Source\Student\UpdateSourceImp;

final class SourceUseCasesTestHelper
{
    public static function getCreateSourceCommand(array $overwrite = []): CreateSourceImp
    {
        $attributes = $overwrite + SourceAttributesTestHelper::full();
        $command = CreateSourceImp::new($attributes);

        return $command;
    }

    public function getUpdateSourceCommand(array $overwrite = []): UpdateSourceImp
    {
        $attributes = $overwrite + $this->generateAttributes();

        return UpdateSourceImp::new($attributes);
    }
}
