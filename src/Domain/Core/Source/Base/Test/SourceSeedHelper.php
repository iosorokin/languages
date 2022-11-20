<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Test;

use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use App\Base\Test\Helpers\ModuleHelper;
use App\Controll\Source\Student\CreateSourceImp;
use App\Controll\Source\Student\UpdateSourceImp;
use Domain\Core\Source\Base\Model\Entity\StudentSourceLanguage;
use Domain\Core\Source\Student\Controll\Command\CreateSourceHandler;
use Generator;
use Illuminate\Support\Arr;

final class SourceSeedHelper extends ModuleHelper
{
    public function create(): Generator
    {

    }
}
