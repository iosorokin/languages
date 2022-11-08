<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Agregates\Student;

use App\Base\Tests\UnitCase;
use App\Exceptions\InvalidArgumentException;
use App\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Languages\Helpers\Test\LanguageSeedHelper;
use Domain\Core\Languages\Model\Collections\Favorites;

final class StudentTest extends UnitCase
{
    public function testStudentAddLanguageToFavorite()
    {
        $language = LanguageSeedHelper::new()->create();
        $language->activate();
        $favorites = new Favorites();
        $student = new Student(
            id: BigIntId::new(random_int(1, 1000)),
            favorites: $favorites,
        );
        $student->addLanguageInFavorite($language);
        $this->assertTrue($favorites->has($language));
    }

    public function testStudentCanNotAddLanguageToFavorite()
    {
        $this->expectException(InvalidArgumentException::class);
        $language = LanguageSeedHelper::new()->create();
        $favorites = new Favorites();
        $student = new Student(
            id: BigIntId::new(random_int(1, 1000)),
            favorites: $favorites,
        );
        $student->addLanguageInFavorite($language);
        $this->assertTrue($favorites->has($language));
    }
}
