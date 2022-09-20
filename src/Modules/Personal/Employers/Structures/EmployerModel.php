<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Structures;

use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\Personal\BaseAuthStructure;
use Illuminate\Database\Eloquent\Model;

final class EmployerModel extends Model implements AuthableStructure
{
    public function getBaseAuth(): BaseAuthStructure
    {
        return $this->baseAuth;
    }
}
