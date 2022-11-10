<?php

declare(strict_types=1);

namespace Domain\Core\Language\Guest\Model\Aggregate;

use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeNameImp;

final class LanguageFactory
{
    public function restoreFromArray(array $data): Language
    {
        $language = new Language(
            name: NameImp::new($data['name']),
            nativeName: NativeNameImp::new($data['native_name']),
            code: CodeImp::new($data['code']),
        );

        return $language;
    }
}
