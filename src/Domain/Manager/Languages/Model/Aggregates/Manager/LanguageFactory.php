<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Aggregates\Manager;

use App\Controll\Commands\Language\RestoreLanguageCommand;
use App\Values\Datetime\Now;
use App\Values\Datetime\TimestampImp;
use App\Values\Identificatiors\Id\BigIntId;
use App\Values\Identificatiors\Id\IntId;
use App\Values\Identificatiors\Id\StrictNullId;
use App\Values\Language\Code\CodeImp;
use App\Values\Language\Name\NameImp;
use App\Values\Language\NativeName\NativeNameImp;
use App\Values\State\IsActiveImp;
use Domain\Core\Languages\Model\Manager\Commands\Manager\CreateLanguage;
use Domain\Manager\Languages\Entities\LanguageOwner;

final class LanguageFactory
{
    public function new(IntId $owner, CreateLanguage $dto): ManagerLanguage
    {
        return new ManagerLanguage(
            langaugeId: StrictNullId::new(),
            owner: new LanguageOwner($owner),
            name: NameImp::new($dto->name()),
            nativeName: NativeNameImp::new($dto->nativeName()),
            code: CodeImp::new($dto->name()),
            isActive: IsActiveImp::new(false),
            createdAt: Now::new(),
        );
    }

    public function restore(RestoreLanguageCommand $dto): ManagerLanguage
    {
        return new ManagerLanguage(
            langaugeId: BigIntId::new($dto->id()),
            owner: new LanguageOwner(
                BigIntId::new($dto->owner()),
            ),
            name: NameImp::new($dto->name()),
            nativeName: NativeNameImp::new($dto->nativeName()),
            code: CodeImp::new($dto->name()),
            isActive: IsActiveImp::new(false),
            createdAt: TimestampImp::new($dto->createdAt()),
        );
    }
}
