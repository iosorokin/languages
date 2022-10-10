<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use App\Base\Entity\HasDescription;
use App\Base\Entity\HasTitle;
use App\Base\Entity\Identify\HasIntId;
use Core\Base\Tests\UnitCase;
use Core\Services\Morph\Exceptions\MorphNotFound;
use Core\Services\Morph\Exceptions\NotUniqueMorph;
use Illuminate\Support\Carbon;
use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sources\Entities\HasSource;
use Modules\Domain\Sources\Entities\Source;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Entites\HasContainer;
use Modules\Personal\User\Entities\HasUser;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Entities\UserModel;

final class MorphTest extends UnitCase
{
    public function testMorphFound()
    {
        $class = new UserModel();

        $morph = Morph::getMorph($class);
        $this->assertSame('user', $morph);
    }

    public function testThrowIfMorphNotFound()
    {
        $this->expectException(MorphNotFound::class);

        $class = new class {};
        Morph::getMorph($class);
    }

    public function testThrowIfNotUniqueMorph()
    {
        $this->expectException(NotUniqueMorph::class);
        $class = new FakeEntityForTestMorph();

        Morph::getMorph($class::class);
    }
}
