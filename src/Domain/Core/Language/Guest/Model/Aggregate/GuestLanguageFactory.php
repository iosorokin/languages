<?php

declare(strict_types=1);

namespace Domain\Core\Language\Guest\Model\Aggregate;

use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeNameImp;
use App\Model\Values\State\IsActiveImp;

final class GuestLanguageFactory
{
    public function restoreFromArray(array $data): GuestLanguage
    {
        $language = new GuestLanguage(
            name: NameImp::new($data['name']),
            nativeName: NativeNameImp::new($data['native_name']),
            code: CodeImp::new($data['code']),
            isActive: IsActiveImp::new($data['is_active']),
        );

        return $language;
    }
}
