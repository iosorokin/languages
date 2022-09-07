<?php

namespace Modules\Personal\User\Structures;

use App\Contracts\Structures\Personal\UserStructure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Personal\Learner\Structures\LearnerModel;

class UserModel extends Model implements UserStructure
{
    protected $table = 'users';

    public function learner(): HasOne
    {
        return $this->hasOne(LearnerModel::class);
    }
}
