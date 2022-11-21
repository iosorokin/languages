<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Policy;

use App\Base\Model\Roles\Root;
use App\Exceptions\DomainException;
use Domain\Core\Language\Root\Control\Dto\CreateLanguageDto;

final class CanAssignOwner
{
    public function __invoke(Root $root, CreateLanguageDto $dto): void
    {
        if ($dto->owner() !== $root->id()->toInt()) {
            throw new DomainException('Владелец языка может быть только суперадмин');
        }
    }
}
