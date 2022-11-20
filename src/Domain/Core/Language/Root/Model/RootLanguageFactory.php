<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Model;

use App\Base\Model\Values\Datetime\Now;
use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Language\Base\Model\Aggregate\LanguageImp;
use Domain\Core\Language\Base\Model\Value\Code\CodeImp;
use Domain\Core\Language\Base\Model\Value\Name\NameImp;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeNameImp;
use Domain\Core\Language\Base\Model\Value\Status\StatusImp;
use Domain\Core\Language\Root\Control\Commands\CreateLanguage;

final class RootLanguageFactory
{
    public static function new(CreateLanguage $command): RootLanguage
    {
        return new LanguageImp(
            code: CodeImp::new($command->code()),
            owner: BigIntId::new($command->root()->id()->toInt()),
            name: NameImp::new($command->name()),
            nativeName: NativeNameImp::new($command->nativeName()),
            status: StatusImp::draft(),
            createdAt: Now::new(),
        );
    }
}
