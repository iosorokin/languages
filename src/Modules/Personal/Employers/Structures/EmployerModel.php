<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Structures;

use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\BaseAuthStructure;
use App\Contracts\Structures\EmployerStructure;
use App\Contracts\Structures\UserStructure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\Personal\Auth\Structures\BaseAuthModel;
use Modules\Personal\User\Structures\UserModel;
use Webmozart\Assert\Assert;

final class EmployerModel extends Model implements AuthableStructure, EmployerStructure
{
    protected $table = 'employers';

    private function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }

    private function baseAuth(): MorphOne
    {
        return $this->morphOne(BaseAuthModel::class, 'authable');
    }

    public function getUser(): UserStructure
    {
        return $this->user;
    }

    public function setUser(UserStructure $user): static
    {
        Assert::isInstanceOf($user, UserModel::class);
        $this->user()->associate($user);

        return $this;
    }

    public function getBaseAuth(): BaseAuthStructure
    {
        return $this->baseAuth;
    }
}
