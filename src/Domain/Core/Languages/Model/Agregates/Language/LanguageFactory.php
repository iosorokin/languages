<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Agregates\Language;

use App\Repositories\Eloquent\Language\LanguageRepository;
use App\Values\Datetime\Now;
use App\Values\Datetime\TimestampImp;
use App\Values\Identificatiors\Id\BigIntId;
use App\Values\Identificatiors\Id\StrictNullId;
use App\Values\State\IsActiveImp;
use Domain\Core\Languages\Dto\CreateLanguageDto;
use Domain\Core\Languages\Dto\RestoreLanguageDto;
use Domain\Core\Languages\Model\Entities\LanguageOwner;
use Domain\Core\Languages\Model\Values\Name\CodeImp;
use Domain\Core\Languages\Model\Values\Name\NameImp;
use Domain\Core\Languages\Model\Values\Name\NativeNameImp;

final class LanguageFactory
{
    public function new(CreateLanguageDto $dto): Language
    {
        return new Language(
            id: StrictNullId::new(),
            owner: new LanguageOwner(
                BigIntId::new($dto->ownerId()),
            ),
            name: NameImp::new($dto->name()),
            nativeName: NativeNameImp::new($dto->nativeName()),
            code: CodeImp::new($dto->name()),
            isActive: IsActiveImp::new(false),
            createdAt: Now::new(),
        );
    }

    public function restore(RestoreLanguageDto $dto): Language
    {
        return new Language(
            id: BigIntId::new($dto->id()),
            owner: new LanguageOwner(
                BigIntId::new($dto->ownerId()),
            ),
            name: NameImp::new($dto->name()),
            nativeName: NativeNameImp::new($dto->nativeName()),
            code: CodeImp::new($dto->name()),
            isActive: IsActiveImp::new(false),
            createdAt: TimestampImp::new($dto->createdAt()),
        );
    }
}
