<?php

declare(strict_types=1);

namespace Infrastructure\Database\Repositories\Personal\Providers;

use App\Support\Assert;
use Illuminate\Support\Carbon;
use stdClass;

final class UserRawDataProvider implements UserDataProvider
{
    public function __construct(
        private stdClass $data,
    ) {}

    public function getId(): int
    {
        return $this->data->id;
    }

    public function getName(): string
    {
        return $this->data->name;
    }

    public function getRoles(): array
    {
        return json_decode($this->data->roles);
    }

    public function getCreatedAt(): Carbon
    {
        return Carbon::make($this->data->created_at);
    }

    public function getUpdatedAt(): Carbon
    {
        return Carbon::make($this->data->updated_at);
    }

    public function hasBaseAuth(): bool
    {
        return isset($this->data->email, $this->data->password);
    }

    public function getEmail(): string
    {
        Assert::isSet($this, 'email');

        return $this->data->email;
    }

    public function getPassword(): string
    {
        Assert::isSet($this, 'password');

        return $this->data->password;
    }
}
