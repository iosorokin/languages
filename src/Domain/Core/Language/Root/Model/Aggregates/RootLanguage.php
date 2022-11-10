<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Model\Aggregates;

use App\Model\Values\Identificatiors\Id\BigIntId;
use App\Model\Values\Language\Code\Code;
use App\Model\Values\Language\Name\Name;
use App\Model\Values\Language\NativeName\NativeName;
use Domain\Core\Language\Base\Model\Aggregates\Language;
use Domain\Core\Language\Root\Repositories\RootLanguageRepository;

final class RootLanguage extends Language
{
    public function changeName(Name $name): self
    {
        if ($this->name->compare($name)) {
            $this->name = $name;
        }

        return $this;
    }

    public function changeNativeName(NativeName $name): self
    {
        if ($this->nativeName->compare($name)) {
            $this->nativeName = $name;
        }

        return $this;
    }

    public function changeCode(Code $code): self
    {
        if ($this->code->compare($code)) {
            $this->code = $code;
        }

        return $this;
    }

    public function commit(RootLanguageRepository $repository): self
    {
        $this->id = BigIntId::new($repository->add($this));

        return $this;
    }

    public function delete(RootLanguageRepository $repository): void
    {
        $repository->delete($this->id()->toInt());
    }
}
