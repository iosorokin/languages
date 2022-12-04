<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root\Domain\Model;

use Core\Base\Model\Values\Datetime\Now;
use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Domain\Education\Language\Base\Model\Value\Code\CodeImp;
use Domain\Education\Language\Base\Model\Value\Name\NameImp;
use Domain\Education\Language\Base\Model\Value\NativeName\NativeNameImp;
use Domain\Education\Language\Base\Model\Value\Status\StatusImp;
use Domain\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;

final class LanguageFactory
{
    public static function new(CreateLanguageDto $dto): Language
    {
        return new Language(
            code: CodeImp::new($dto->code),
            owner: BigIntId::new($dto->ownerId),
            name: NameImp::new($dto->name),
            nativeName: NativeNameImp::new($dto->nativeName),
            status: StatusImp::draft(),
            createdAt: Now::new(),
        );
    }
}
