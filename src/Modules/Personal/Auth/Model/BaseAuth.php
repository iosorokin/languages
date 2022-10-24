<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Model;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;
use Modules\Personal\User\Model\HasUser;

final class BaseAuth extends Model
{
    use SerializesModels;

    use IntId;
    use Timestamps;
    use HasUser;
}
