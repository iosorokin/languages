<?php

namespace Modules\Personal\Learner\Dto;

use App\Base\Dto;
use App\Extensions\Assert;
use App\Structures\Personal\UserStructure;

class CreateLearnerDto implements Dto
{
    private UserStructure $user;

    public static function new(UserStructure$user, array $attributes): self
    {
        $createLearner = new self();
        $createLearner->setUser($user);

        return $createLearner;
    }

    public function setUser(UserStructure $user): self
    {
        Assert::isNotSet($user, 'user');
        $this->user = $user;

        return $this;
    }

    public function getUser(): UserStructure
    {
        return $this->user;
    }

    public function toArray(): array
    {
        return [];
    }
}
