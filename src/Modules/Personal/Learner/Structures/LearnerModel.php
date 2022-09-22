<?php

namespace Modules\Personal\Learner\Structures;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Laravel\Sanctum\HasApiTokens;
use Modules\Personal\Auth\Structures\AuthableStructure;
use Modules\Personal\Auth\Structures\BaseAuthModel;
use Modules\Personal\Auth\Structures\BaseAuthStructure;
use Modules\Personal\User\Structures\UserModel;
use Modules\Personal\User\Structures\UserStructure;
use Webmozart\Assert\Assert;

class LearnerModel extends Model implements
    LearnerStructure,
    AuthableStructure,
    Authenticatable
{
    use HasApiTokens;
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'learners';

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
