<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Controllers;

use App\Controll\Source\Student\GetSourcesImp;
use App\Education\Source\Student\Domain\Model\Collection\StudentSources;

final class GetSourcesHandler
{
    public function __invoke(GetSourcesImp $query): StudentSources
    {

    }
}
