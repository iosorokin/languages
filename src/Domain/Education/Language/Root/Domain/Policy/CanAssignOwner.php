<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root\Domain\Policy;

use Core\Base\Model\Roles\Root;
use Domain\Exceptions\DomainException;
use Domain\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;

final class CanAssignOwner
{
    public function __invoke(Root $root, CreateLanguageDto $dto): void
    {
        if ($dto->owner() !== $root->id()->toInt()) {
            throw new DomainException('Владелец языка может быть только суперадмин');
        }
    }
}
//
