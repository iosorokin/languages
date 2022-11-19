<?php

namespace Domain\Core\Source\Student\Repository;

use App\Base\Model\Values\Identificatiors\Id\IntId;
use Domain\Core\Source\Student\Model\Entity\StudentSourceLanguage;

interface StudentSourceLanguageRepository
{
    public function find(IntId $id): StudentSourceLanguage;
}
