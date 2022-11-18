<?php

namespace Domain\Core\Language\Base\Model\Aggregate;

use Domain\Core\Language\Base\Model\Value\Code\Code;
use Domain\Core\Language\Base\Model\Value\Name\Name;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeName;

interface Language extends ReadonlyLanguage
{
    public function changeName(Name $name): self;

    public function changeNativeName(NativeName $name): self;

    public function changeCode(Code $code): self;

    public function activate(): self;

    public function draft(): self;
}
