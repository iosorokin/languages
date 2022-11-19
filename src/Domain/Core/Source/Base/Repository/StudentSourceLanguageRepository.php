<?php

namespace Domain\Core\Source\Base\Repository;

use App\Base\Model\Values\Identificatiors\Id\IntId;
use Domain\Core\Source\Base\Model\Entity\StudentSourceLanguage;

interface StudentSourceLanguageRepository
{
    public function find(IntId $id): StudentSourceLanguage;
}
