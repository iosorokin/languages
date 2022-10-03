<?php

declare(strict_types=1);

namespace Modules\Education\Source\Policy;

use App\Contracts\Contexts\Client;
use Modules\Languages\Entity\Language;
use Modules\Personal\User\Entities\User;

final class LaravelSourcePolicy implements SourcePolicy
{
    public function canCreate(Client $client, Language $language): void
    {

    }
}
