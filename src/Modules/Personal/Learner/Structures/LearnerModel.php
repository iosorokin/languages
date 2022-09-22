<?php

namespace Modules\Personal\Learner\Structures;

use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\BaseAuthStructure;
use App\Contracts\Structures\LearnerStructure;
use App\Contracts\Structures\UserStructure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Laravel\Sanctum\HasApiTokens;
use Modules\Personal\Auth\Structures\BaseAuthModel;
use Modules\Personal\User\Structures\UserModel;
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
