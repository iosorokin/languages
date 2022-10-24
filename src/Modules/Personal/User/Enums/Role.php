<?php

declare(strict_types=1);

namespace Modules\Personal\User\Enums;

enum Role: string
{
    case User = 'user';

    case Admin = 'admin';
}
