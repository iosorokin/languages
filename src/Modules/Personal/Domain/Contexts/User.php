<?php

declare(strict_types=1);

namespace Modules\Personal\Domain\Contexts;

use App\Values\Identificatiors\BigIntIntId;
use App\Values\Identificatiors\IntId;
use App\Values\Identificatiors\StrictNullId;
use Modules\Personal\Domain\Values\BaseAuth;
use Modules\Personal\Domain\Values\Email;
use Modules\Personal\Domain\Values\Name;
use Modules\Personal\Domain\Values\Password;
use Modules\Personal\Domain\Values\Roles;

class User
{
    public function __construct(
        private IntId            $id,
        private Name             $name,
        private Roles            $roles,
        private BaseAuth         $baseAuth,
        private Timestamps $timestamps,
    ) {}

    public static function register(array $attributes): self
    {
        $student = new static(
            id: new StrictNullId(),
            name: new Name($attributes['name']),
            roles: new Roles(),
            baseAuth: new BaseAuth(
                new Email($attributes['email']),
                new Password($attributes['password']),
            ),
            timestamps: new NullTimestamps(),
        );

        return $student;
    }

    public function setId(BigIntIntId $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): IntId
    {
        return $this->id;
    }

    public function setName(Name $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function setRoles(Roles $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function roles(): Roles
    {
        return $this->roles;
    }

    public function setBaseAuth(BaseAuth $baseAuth): static
    {
        $this->baseAuth = $baseAuth;

        return $this;
    }

    public function baseAuth(): BaseAuth
    {
        return $this->baseAuth;
    }

    public function setTimestamps(PresetTimestamps $timestamps): static
    {
        $this->timestamps = $timestamps;

        return $this;
    }

    public function timestamps(): Timestamps
    {
        return $this->timestamps;
    }

    public function selfToArray(): array
    {
        $data = [
            'name' => $this->getName()->value(),
            'roles' => $this->roles()->toArray(),
        ];
        if (isset($this->timestamps)) {
            $data['created_at'] = $this->timestamps->createdAt();
            $data['updated_at'] = $this->timestamps->updatedAt();
        }
        if (isset($this->id)) $data['id'] = $this->getId()->value();

        return $data;
    }

    public function toArray(): array
    {
        $data = $this->selfToArray();
        $data['auth'] = $this->baseAuth()->toArray();

        return $data;
    }
}
