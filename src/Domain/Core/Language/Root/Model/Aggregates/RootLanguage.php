<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Model\Aggregates;

use App\Model\Roles\Root;
use App\Model\Values\Datetime\Now;
use App\Model\Values\Datetime\TimestampImp;
use App\Model\Values\Identificatiors\Id\BigIntId;
use App\Model\Values\Identificatiors\Id\StrictNullId;
use App\Model\Values\Language\Code\Code;
use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\Name;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeName;
use App\Model\Values\Language\NativeName\NativeNameImp;
use App\Model\Values\State\IsActiveImp;
use Domain\Core\Language\Base\Model\Aggregates\Language;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguage;
use Domain\Core\Language\Root\Model\Structures\RootLanguageStructure;
use Domain\Core\Language\Root\Repositories\ManagerLanguageRepository;

final class RootLanguage extends Language
{
    public static function new(Root $root, RootCreateLanguage $command): RootLanguage
    {
        $language = new self();
        $language->id = StrictNullId::new();
        $language->owner = $root->id();
        $language->name = NameImp::new($command->name());
        $language->nativeName = NativeNameImp::new($command->nativeName());
        $language->code = CodeImp::new($command->name());
        $language->isActive = IsActiveImp::new(false);
        $language->createdAt = Now::new();

        return $language;
    }

    public static function restore(RootLanguageStructure $structure): RootLanguage
    {
        $language = new self();
        $language->id = BigIntId::new($structure->id);
        $language->owner = BigIntId::new($structure->owner);
        $language->name = NameImp::new($structure->name);
        $language->nativeName = NativeNameImp::new($structure->nativeName);
        $language->code = CodeImp::new($structure->name);
        $language->isActive = IsActiveImp::new($structure->isActive);
        $language->createdAt = TimestampImp::new($structure->createdAt);

        return $language;
    }

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

    public function commit(ManagerLanguageRepository $repository): self
    {
        $this->id = BigIntId::new($repository->add($this->toStructure()));

        return $this;
    }

    public function delete(ManagerLanguageRepository $repository): void
    {
        $repository->delete($this->id()->toInt());
    }

    public function toStructure(): RootLanguageStructure
    {
        return new RootLanguageStructure(
            id: $this->id()->toInt(),
            owner: $this->owner()->toInt(),
            name: $this->name()->get(),
            nativeName: $this->nativeName()->get(),
            code: $this->code()->get(),
            isActive: $this->isActive()->get(),
            createdAt: $this->createdAt()->get(),
        );
    }
}
