<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Model\Aggregates;

use App\Model\Values\Datetime\Timestamp;
use App\Model\Values\Identificatiors\Id\BigIntId;
use App\Model\Values\Identificatiors\Id\IntId;
use App\Model\Values\Language\Code\Code;
use App\Model\Values\Language\Name\Name;
use App\Model\Values\Language\NativeName\NativeName;
use App\Model\Values\State\IsActive;
use Domain\Core\Language\Root\Repositories\LanguageRepository;

final class Language
{
    public function __construct(
        private IntId      $id,
        private IntId      $owner,
        private Name       $name,
        private NativeName $nativeName,
        private Code       $code,
        private IsActive   $isActive,
        private Timestamp  $createdAt,
    ) {}

    public function id(): IntId
    {
        return clone $this->id;
    }

    public function owner(): IntId
    {
        return clone $this->owner;
    }

    public function isActive(): IsActive
    {
        return $this->isActive;
    }

    public function name(): Name
    {
        return clone $this->name;
    }

    public function nativeName(): NativeName
    {
        return clone $this->nativeName;
    }

    public function code(): Code
    {
        return clone $this->code;
    }

    public function createdAt(): Timestamp
    {
        return clone $this->createdAt;
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

    public function commit(LanguageRepository $repository): self
    {
        $this->id = BigIntId::new($repository->add($this));

        return $this;
    }

    public function delete(LanguageRepository $repository): void
    {
        $repository->delete($this->id()->toInt());
    }
}
