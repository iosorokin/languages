<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Controll\Query;

use App\Controll\Source\Student\GetSourcesImp;
use Domain\Core\Source\Base\Model\Collection\StudentSources;

final class GetSourcesHandler
{
    public function __invoke(GetSourcesImp $query): StudentSources
    {

    }
}
