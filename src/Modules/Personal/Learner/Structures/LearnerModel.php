<?php

namespace Modules\Personal\Learner\Structures;

use App\Contracts\AuthableStructure;
use App\Structures\Personal\BaseAuthStructure;
use App\Structures\Personal\LearnerStructure;
use App\Structures\Personal\UserStructure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Laravel\Sanctum\HasApiTokens;
use Modules\Personal\Auth\Structures\BaseAuthModel;
use Modules\Personal\User\Structures\UserModel;
use Webmozart\Assert\Assert;

class LearnerModel extends Model implements
    LearnerStructure,
    AuthableStructure
{
    use HasApiTokens;

    protected $table = 'learners';

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }

    public function baseAuth(): MorphOne
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

    public function setBaseAuth(BaseAuthStructure $structure): static
    {
        // fixme плохо устанавливать в обход связям
        $this->baseAuth = $structure;

        return $this;
    }

    public function getBaseAuth(): BaseAuthStructure
    {
        return $this->baseAuth;
    }
}
