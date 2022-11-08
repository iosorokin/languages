<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Agregates\Student;

use App\Values\Identificatiors\Id\IntId;
use Domain\Core\Languages\Model\Agregates\Language\Language;
use Domain\Core\Languages\Model\Agregates\Language\Policies\CanAddToFavorite;
use Domain\Core\Languages\Model\Collections\Favorites;

final class Student
{
    public function __construct(
        private IntId     $id,
        private Favorites $favorites,
    ) {}

    public function addLanguageInFavorite(Language $language): self
    {
        (new CanAddToFavorite)($language);
        $this->favorites->add($language);

        return $this;
    }
}
