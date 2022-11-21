<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Model;

use App\Base\Model\Values\Datetime\Now;
use App\Base\Model\Values\Datetime\Timestamp;
use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use App\Base\Model\Values\Identificatiors\Id\IntId;
use Domain\Core\Language\Base\Model\Value\Code\Code;
use Domain\Core\Language\Base\Model\Value\Code\CodeImp;
use Domain\Core\Language\Base\Model\Value\Name\Name;
use Domain\Core\Language\Base\Model\Value\Name\NameImp;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeName;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeNameImp;
use Domain\Core\Language\Base\Model\Value\Status\Status;
use Domain\Core\Language\Base\Model\Value\Status\StatusImp;
use Domain\Core\Language\Root\Control\Dto\CreateLanguageDto;

final class Language
{
    public function __construct(
        protected Code       $code,
        protected IntId      $owner,
        protected Name       $name,
        protected NativeName $nativeName,
        protected Status     $status,
        protected Timestamp  $createdAt,
    ) {}

    public static function new(CreateLanguageDto $dto): Language
    {
        return new Language(
            code: CodeImp::new($dto->code()),
            owner: BigIntId::new($dto->owner()->id()->toInt()),
            name: NameImp::new($dto->name()),
            nativeName: NativeNameImp::new($dto->nativeName()),
            status: StatusImp::draft(),
            createdAt: Now::new(),
        );
    }

    public function owner(): IntId
    {
        return $this->owner;
    }

    public function status(): Status
    {
        return $this->status;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function nativeName(): NativeName
    {
        return $this->nativeName;
    }

    public function code(): Code
    {
        return $this->code;
    }

    public function createdAt(): Timestamp
    {
        return $this->createdAt;
    }

    public function changeName(Name $name): self
    {
        if (! $this->name->compare($name)) {
            $this->name = $name;
        }

        return $this;
    }

    public function changeNativeName(NativeName $name): self
    {
        if (! $this->nativeName->compare($name)) {
            $this->nativeName = $name;
        }

        return $this;
    }

    public function changeCode(Code $code): self
    {
        if (! $this->code->compare($code)) {
            $this->code = $code;
        }

        return $this;
    }

    public function activate(): self
    {
        $new = StatusImp::active();
        if (! $this->status->compare($new)) {
            $this->status = $new;
        }

        return $this;
    }

    public function draft(): self
    {
        $new = StatusImp::draft();
        if (! $this->status->compare($new)) {
            $this->status = $new;
        }

        return $this;
    }
}
