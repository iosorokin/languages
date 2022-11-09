<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Aggregates\Manager;

use App\Roles\ContentManager;
use App\Values\Datetime\Timestamp;
use App\Values\Identificatiors\Id\BigIntId;
use App\Values\Identificatiors\Id\IntId;
use App\Values\Language\Code\Code;
use App\Values\Language\Name\Name;
use App\Values\Language\NativeName\NativeName;
use App\Values\State\IsActive;
use App\Values\State\IsActiveImp;
use Domain\Core\Languages\Model\Manager\ManagerLanguageRepository;
use Domain\Core\Languages\Model\Manager\Responses\LanguageResponse;
use Domain\Manager\Languages\Entities\LanguageOwner;

final class ManagerLanguage
{
    public function __construct(
        private ContentManager     $manager,
        private IntId              $langaugeId,
        private LanguageOwner      $owner,
        private Name               $name,
        private NativeName         $nativeName,
        private Code               $code,
        private IsActive           $isActive,
        private readonly Timestamp $createdAt,
    ) {}

    public function id(): IntId
    {
        return clone $this->langaugeId;
    }

    public function owner(): LanguageOwner
    {
        return clone $this->owner;
    }

    public function activate(): self
    {
        $this->isActive = IsActiveImp::new(true);

        return $this;
    }

    public function deactivate(): self
    {
        $this->isActive = IsActiveImp::new(false);

        return $this;
    }

    public function isActive(): IsActive
    {
        return $this->isActive;
    }

    public function name(): Name
    {
        return clone $this->name;
    }

    public function changeName(Name $name): self
    {
        if ($this->name->compare($name)) {
            $this->name = $name;
        }

        return $this;
    }

    public function nativeName(): NativeName
    {
        return clone $this->nativeName;
    }

    public function changeNativeName(NativeName $name): self
    {
        if ($this->nativeName->compare($name)) {
            $this->nativeName = $name;
        }

        return $this;
    }

    public function code(): Code
    {
        return clone $this->code;
    }

    public function changeCode(Code $code): self
    {
        if ($this->code->compare($code)) {
            $this->code = $code;
        }

        return $this;
    }

    public function delete(ManagerLanguageRepository $repository): void
    {
        $repository->delete($this);
    }

    public function createdAt(): Timestamp
    {
        return clone $this->createdAt;
    }

    public function commit(ManagerLanguageRepository $repository): self
    {
        $this->langaugeId = BigIntId::new($repository->add($this));

        return $this;
    }

    public function toResponse(): LanguageResponse
    {
        return new LanguageResponse($this);
    }
}
