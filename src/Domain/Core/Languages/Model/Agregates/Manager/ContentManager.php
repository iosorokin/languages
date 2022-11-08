<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Agregates\Manager;

use App\Base\Entity;
use App\Values\Identificatiors\Id\IntId;

final class ContentManager extends Entity
{
    public function __construct(
        private IntId $id,
    ) {}

    public function createLanguage()
    {

    }
}
