<?php

namespace Domain\Core\Languages\Authorization;

use App\Values\Identificatiors\Id\IntId;

interface LanguageAuthorization
{
    public function isRoot(IntId $id): bool;

    public function checkRoot(IntId $id): void;
}
