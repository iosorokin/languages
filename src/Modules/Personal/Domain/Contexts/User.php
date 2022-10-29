<?php

declare(strict_types=1);

namespace Modules\Personal\Domain\Contexts;

use App\Values\Datetime\StrictNullTimestamp;
use App\Values\Datetime\Timestamp;
use App\Values\Identificatiors\IntId;
use App\Values\Identificatiors\StrictNullId;
use Modules\Personal\Domain\Values\BaseAuth;
use Modules\Personal\Domain\Values\Email;
use Modules\Personal\Domain\Values\Name;
use Modules\Personal\Domain\Values\Password;
use Modules\Personal\Domain\Values\Roles;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

class User
{
    public function __construct(
        IntId     $id,
        Name      $name,
        Roles     $roles,
        BaseAuth  $baseAuth,
        Timestamp $timestamps,
    ) {
        $model = new EloquentUserModel();
    }

    public static function register(array $attributes): self
    {
        $context = new static(
            id: new StrictNullId(),
            name: new Name($attributes['name']),
            roles: new Roles(),
            baseAuth: new BaseAuth(
                new Email($attributes['email']),
                new Password($attributes['password']),
            ),
            timestamps: new StrictNullTimestamp(),
        );

        return $context;
    }
}
