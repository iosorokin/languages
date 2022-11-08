<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Agregates\Language;

use App\Repositories\Eloquent\Language\LanguageRepository;
use App\Values\Datetime\Timestamp;
use App\Values\Identificatiors\Id\BigIntId;
use App\Values\Identificatiors\Id\IntId;
use App\Values\State\IsActive;
use App\Values\State\IsActiveImp;
use Domain\Core\Languages\Authorization\LanguageAuthorization;
use Domain\Core\Languages\Model\Agregates\Language\Policies\CanAssignOwner;
use Domain\Core\Languages\Model\Entities\LanguageOwner;
use Domain\Core\Languages\Model\Values\Name\Code;
use Domain\Core\Languages\Model\Values\Name\Name;
use Domain\Core\Languages\Model\Values\Name\NativeName;
use Domain\Support\Authorization\Manager;
use Illuminate\Contracts\Support\Arrayable;

final class Language implements Arrayable
{
    public function __construct(
        private IntId $id,
        private LanguageOwner $owner,
        private Name $name,
        private NativeName $nativeName,
        private Code $code,
        private IsActive $isActive,
        private readonly Timestamp $createdAt,
    ) {}

    public function id(): IntId
    {
        return $this->id;
    }

    public function assignOwner(LanguageOwner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function checkOwner(LanguageAuthorization $languageAuthorization): self
    {
        (new CanAssignOwner($languageAuthorization))($this->owner);

        return $this;
    }

    public function commit(LanguageRepository $repository, LanguageAuthorization $authorization): self
    {
        $this->checkOwner($authorization);
        $this->id = BigIntId::new($repository->add($this));

        return $this;
    }

    public function owner(): LanguageOwner
    {
        return $this->owner;
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

    public function isActive(): bool
    {
        return $this->isActive->toBool();
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function delete(LanguageRepository $repository): void
    {
        $repository->delete($this);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->toInt(),
            'name' => (string) $this->name,
            'native_name' => (string) $this->nativeName,
            'code' => (string) $this->code,
            'is_active' => $this->isActive->toBool(),
            'created_at' => $this->createdAt->get(),
        ];
    }
}
