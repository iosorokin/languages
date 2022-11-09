<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Model\Aggregates;

use App\Base\Entity;
use App\Contracts\EventDispatcher;
use App\Values\Contacts\Email\Email;
use App\Values\Datetime\Timestamp;
use App\Values\Identificatiors\Id\IntId;
use App\Values\Security\Password;
use Domain\Personal\Account\Model\Entities\Accesses\Accesses;
use Domain\Personal\Account\Model\Entities\Accesses\AccessValue;
use Domain\Personal\Account\Model\Entities\Accesses\Policies\EnableRootPolicy;
use Domain\Personal\Account\Model\Entities\Accesses\Policies\FreeDisableAccessPolicy;
use Domain\Personal\Account\Model\Entities\Accesses\Policies\FreeEnablePolicy;
use Domain\Personal\Account\Model\Entities\BaseAuth\BaseAuth;
use Domain\Personal\Account\Model\Entities\Personality\Personality;
use Domain\Personal\Account\Model\Events\AccountCreated;
use Domain\Personal\Account\Repositories\AccountRepository;

final class Account extends Entity
{
    public function __construct(
        private IntId                $id,
        private readonly Personality $personality,
        private readonly BaseAuth    $baseAuth,
        private readonly Accesses    $accesses,
        private readonly Timestamp   $createdAt,
    ) {}

    public function id(): IntId
    {
        return clone $this->id;
    }

    public function password(): Password
    {
        return $this->baseAuth->password();
    }

    public function email(): Email
    {
        return $this->baseAuth->email();
    }

    public function commit(AccountRepository $repository, EventDispatcher $dispatcher): self
    {
        $id = $repository->add($this);
        $this->id = \Domain\Account\Model\Aggregates\BigIntId::new($id);
        $this->pushEvent(new AccountCreated($this->id));
        $dispatcher->dispatchAll($this->events());

        return $this;
    }

    public function enableRoot(AccountRepository $accountRepository): self
    {
        $this->accesses->enable(AccessValue::Root, new EnableRootPolicy($accountRepository));

        return $this;
    }

    public function isRoot(): bool
    {
        return $this->accesses->isEnable(AccessValue::Root);
    }

    public function isStudent(): bool
    {
        return $this->accesses->isEnable(AccessValue::Root);
    }

    public function enableStudent(): self
    {
        $this->accesses->enable(AccessValue::Student, new FreeEnablePolicy());

        return $this;
    }

    public function disableStudent(): self
    {
        $this->accesses->disable(AccessValue::Student, new FreeDisableAccessPolicy());

        return $this;
    }
}
