<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Model\Entities\Accesses;

use App\Base\Model\Entity;
use App\Model\Values\Identificatiors\Id\IntId;
use Domain\Personal\Account\Model\Entities\Accesses\Policies\DisableAccessPolicy;
use Domain\Personal\Account\Model\Entities\Accesses\Policies\EnableAccessPolicy;
use Domain\Personal\Account\Model\Values\Access\Access;
use Domain\Personal\Account\Model\Values\Access\DisableAccess;
use Domain\Personal\Account\Model\Values\Access\EnableAccess;

final class Accesses extends Entity
{
    public function __construct(
        private IntId $accountId,
        private Access $student,
        private Access $root,
    ) {}

    public function enable(AccessValue $accessValue, EnableAccessPolicy $policy): self
    {
        $policy();
        match (true) {
            $accessValue->isRoot() => $this->enableRoot(EnableAccess::new(), $policy),
            $accessValue->isStudent() => $this->setStudent(EnableAccess::new()),
        };

        return $this;
    }

    public function disable(AccessValue $accessValue, DisableAccessPolicy $policy): self
    {
        $policy();
        match (true) {
            $accessValue->isStudent() => $this->setStudent(DisableAccess::new()),
        };

        return $this;
    }

    public function isEnable(AccessValue $accessValue): bool
    {
        return match (true) {
            $accessValue->isRoot() => $this->root->isEnable(),
            $accessValue->isStudent() => $this->student->isEnable(),
        };
    }

    public function toArray(): array
    {
        return [
            'account_id' => $this->accountId->toInt(),
            'user' => $this->student->toBool(),
            'root' => $this->root->toBool(),
        ];
    }

    private function enableRoot(Access $access): self
    {
        if (! $this->root->compare($access)) {
            $this->root = $access;
        }

        return $this;
    }

    private function setStudent(Access $access): self
    {
        if ($this->student->compare($access)) {
            $this->student = $access;
        }

        return $this;
    }
}
