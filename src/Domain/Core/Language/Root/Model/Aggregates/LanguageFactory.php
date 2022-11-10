<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Model\Aggregates;

use App\Model\Roles\Root;
use App\Model\Roles\Student;
use App\Model\Values\Datetime\Now;
use App\Model\Values\Datetime\TimestampImp;
use App\Model\Values\Identificatiors\Id\BigIntId;
use App\Model\Values\Identificatiors\Id\StrictNullId;
use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeNameImp;
use App\Model\Values\State\IsActiveImp;
use Domain\Core\Language\Root\Control\Commands\CreateLanguage;

final class LanguageFactory
{
    public function new(Root $root, CreateLanguage $command): Language
    {
        $language = new Language(
            id: StrictNullId::new(),
            owner: $root->id(),
            name: NameImp::new($command->name()),
            nativeName: NativeNameImp::new($command->nativeName()),
            code: CodeImp::new($command->name()),
            isActive: IsActiveImp::new(false),
            createdAt: Now::new(),
        );

        return $language;
    }

    public function restoreFromArray(array $data): Language
    {
        $language = new Language(
            id: BigIntId::new($data['id']),
            owner: BigIntId::new($data['owner']),
            name: NameImp::new($data['name']),
            nativeName: NativeNameImp::new($data['native_name']),
            code: CodeImp::new($data['code']),
            isActive: IsActiveImp::new($data['is_active']),
            createdAt: TimestampImp::new($data['created_at']),
        );

        return $language;
    }
}
