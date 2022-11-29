<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Domain\Model;

use Core\Base\Model\Values\Datetime\Now;
use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use App\Education\Language\Base\Model\Value\Code\CodeImp;
use App\Education\Language\Base\Model\Value\Name\NameImp;
use App\Education\Language\Base\Model\Value\NativeName\NativeNameImp;
use App\Education\Language\Base\Model\Value\Status\StatusImp;
use App\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;

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
