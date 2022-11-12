<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Entities\Personality;

use App\Base\Model\Entity;
use App\Model\Values\Identificatiors\Id\IntId;
use App\Model\Values\Personality\Name\Name;

final class Personality extends Entity
{
    public function __construct(
        private readonly IntId $accountId,
        private Name $name,
    ) {}

    public function accountId(): IntId
    {
        return $this->accountId;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
            'account_id' => $this->accountId,
            'name' => $this->name->get(),
        ];
    }
}
