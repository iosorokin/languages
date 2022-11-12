<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Model\Aggregates;

use App\Model\Values\Identificatiors\Id\BigIntId;
use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeNameImp;
use App\Model\Values\State\IsActiveImp;
use Domain\Core\Language\Student\Model\Values\Learning\IsLearningImp;

final class StudentLanguageFactory
{
    public function restoreFromArray(array $data): StudentLanguage
    {
        $language = new StudentLanguage(
            student: BigIntId::new($data['student']),
            id: BigIntId::new($data['id']),
            isLearning: IsLearningImp::new($data['is_learning']),
            name: NameImp::new($data['name']),
            nativeName: NativeNameImp::new($data['native_name']),
            code: CodeImp::new($data['code']),
            isActive: IsActiveImp::new($data['is_active']),
        );

        return $language;
    }
}
