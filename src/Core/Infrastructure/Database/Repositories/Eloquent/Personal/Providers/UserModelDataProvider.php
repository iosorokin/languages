<?php

declare(strict_types=1);

namespace Core\Infrastructure\Database\Repositories\Eloquent\Personal\Providers;

use Illuminate\Support\Carbon;
use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use Core\Infrastructure\Support\Assert;

final class UserModelDataProvider implements UserDataProvider
{
    public function __construct(
        private readonly EloquentUserModel $model
    ) {}

    public function getId(): int
    {
        return $this->model->id;
    }

    public function getName(): string
    {
        return $this->model->name;
    }

    public function getRoles(): array
    {
        return $this->model->roles;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->model->created_at;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->model->updated_at;
    }

    public function hasBaseAuth(): bool
    {
        return $this->model->relationLoaded('baseAuth');
    }

    public function getEmail(): string
    {
        Assert::relationLoaded($this->model,'baseAuth');

        return $this->model->baseAuth->email;
    }

    public function getPassword(): string
    {
        Assert::relationLoaded($this->model,'baseAuth');

        return $this->model->baseAuth->email;
    }
}
