<?php

declare(strict_types=1);

namespace Modules\Personal\User\Structures;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Personal\Learner\Structures\LearnerModel;

final class UserModel extends Model implements UserStructure
{
    protected $table = 'users';

    public function learner(): HasOne
    {
        return $this->hasOne(LearnerModel::class);
    }
}
