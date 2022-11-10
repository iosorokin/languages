<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Model\Aggregates;

use App\Model\Roles\Student;
use App\Model\Values\Datetime\Timestamp;
use App\Model\Values\Favorite\IsFavorite;
use App\Model\Values\Favorite\IsFavoriteImp;
use App\Model\Values\Identificatiors\Id\IntId;
use App\Model\Values\Language\Code\Code;
use App\Model\Values\Language\Name\Name;
use App\Model\Values\Language\NativeName\NativeName;
use App\Model\Values\State\IsActive;
use Domain\Core\Language\Base\Model\Aggregates\Language;

final class StudentLanguage extends Language
{
    public function __construct(
        private IsFavorite $isFavorite,
        IntId $id,
        IntId $owner,
        Name $name,
        NativeName $nativeName,
        Code $code,
        IsActive $isActive,
        Timestamp $createdAt,
    ) {

    }

    public function addToFavorite(Student $student): self
    {


        return $this;
    }

    public function removeFromFavorite(Student $student): self
    {

    }

    public function isFavorite(): IsFavorite
    {
        return $this->isFavorite;
    }
}
