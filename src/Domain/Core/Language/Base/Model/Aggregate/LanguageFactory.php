<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Aggregate;

use App\Base\Model\Values\Datetime\TimestampImp;
use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Language\Base\Model\Value\Code\CodeImp;
use Domain\Core\Language\Base\Model\Value\Name\NameImp;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeNameImp;
use Domain\Core\Language\Base\Model\Value\Status\StatusImp;
use Domain\Core\Language\Base\Repository\Structure\LanguageStructure;

final class LanguageFactory
{
    public static function restore(LanguageStructure $structure): Language
    {
        return new LanguageImp(
            code: CodeImp::new($structure->code()),
            owner: BigIntId::new($structure->owner()),
            name: NameImp::new($structure->name()),
            nativeName: NativeNameImp::new($structure->nativeName()),
            status: StatusImp::new($structure->status()),
            createdAt: TimestampImp::new($structure->createdAt()),
        );
    }
}
