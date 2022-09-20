<?php

declare(strict_types=1);

namespace Modules\Personal\User\Factories;

use App\Contracts\Structures\Personal\UserStructure;
use Illuminate\Support\Arr;
use Modules\Personal\User\Contexts\Filing\NewUserFiller;
use Modules\Personal\User\Structures\UserModel;

final class UserFactory
{
    public function new(array $attributes): UserModel
    {
        $filler = new NewUserFiller(new UserModel());
        $filler->setName(Arr::get($attributes, 'name'));

        return $filler->getStructure();
    }
}
