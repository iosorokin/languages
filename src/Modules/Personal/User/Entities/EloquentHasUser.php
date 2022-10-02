<?php

namespace Modules\Personal\User\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait EloquentHasUser
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }

    public function setUser(User $user): self
    {
        $this->user()->associate($user);

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
