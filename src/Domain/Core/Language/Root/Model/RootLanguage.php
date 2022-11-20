<?php

namespace Domain\Core\Language\Root\Model;

use Domain\Core\Language\Base\Model\Aggregate\Language;
use Domain\Core\Language\Base\Model\Value\Code\Code;
use Domain\Core\Language\Base\Model\Value\Name\Name;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeName;

interface RootLanguage extends Language
{
    public function changeName(Name $name): self;

    public function changeNativeName(NativeName $name): self;

    public function changeCode(Code $code): self;

    public function activate(): self;

    public function draft(): self;
}
