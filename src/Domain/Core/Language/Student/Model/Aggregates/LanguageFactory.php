<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Model\Aggregates;

use App\Model\Values\Identificatiors\Id\BigIntId;
use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeNameImp;
use Domain\Core\Language\Student\Model\Values\Learning\IsLearningImp;

final class LanguageFactory
{
    public function restoreFromArray(array $data): Language
    {
        $language = new Language(
            student: BigIntId::new($data['student']),
            language: BigIntId::new($data['language_id']),
            isLearning: IsLearningImp::new($data['is_learning']),
            name: NameImp::new($data['name']),
            nativeName: NativeNameImp::new($data['native_name']),
            code: CodeImp::new($data['code']),
        );

        return $language;
    }
}
