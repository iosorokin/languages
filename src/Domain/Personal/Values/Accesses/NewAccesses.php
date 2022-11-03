<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Accesses;

use Domain\Personal\Policies\UserAccessPolicy;
use Illuminate\Contracts\Support\Arrayable;

final class NewAccesses extends BaseAccesses implements Accesses
{
    private function __construct(
        private UserAccessPolicy $policy,
    ) {
        parent::__construct(collect());
    }

    public static function make(array|Arrayable $list, UserAccessPolicy $policy): self|InvalidAccessesObject
    {
        $accesses = new self($policy);
        foreach ($list as $item) {
            $enum = Access::tryFrom((string) $item);
            if (! $enum) {
                return InvalidAccessesObject::new([
                    'accesses.enum.' => [
                        'expect' => Access::cases(),
                    ]
                ]);
            }
            $accesses->addAccess($enum);
        }

        return $accesses;
    }

    public function addAccess(string|Access $access): self|InvalidAccessesObject
    {
        if ($access->isRoot()) {
            $this->policy->canAssignAsRoot();
        }
        $this->collection->push($access);

        return $this;
    }

    public function deleteAccess(string|Access $access): self
    {
        if (is_string($access)) {
            $access = Access::tryFrom($access);
        }

        $this->collection->each(function (Access $item, int $key) use ($access){
            if ($access->value === $item->value) {
                $this->collection->forget($key);
            }
        });

        return $this;
    }
}
