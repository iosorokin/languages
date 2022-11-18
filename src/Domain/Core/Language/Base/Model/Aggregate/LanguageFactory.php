<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Aggregate;

use App\Model\Values\Datetime\TimestampImp;
use App\Model\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Language\Base\Model\Value\Code\CodeImp;
use Domain\Core\Language\Base\Model\Value\Name\NameImp;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeNameImp;
use Domain\Core\Language\Base\Model\Value\Status\StatusImp;
use Domain\Core\Language\Base\Repository\Dto\RestoreLanguageDtoImp;

final class LanguageFactory
{
    public static function restore(RestoreLanguageDtoImp $dto): LanguageImp
    {
        return new LanguageImp(
            code: CodeImp::new($dto->code()),
            owner: BigIntId::new($dto->owner()),
            name: NameImp::new($dto->name()),
            nativeName: NativeNameImp::new($dto->nativeName()),
            status: StatusImp::new($dto->status()),
            createdAt: TimestampImp::new($dto->createdAt()),
        );
    }
}
