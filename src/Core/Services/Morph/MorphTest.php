<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use App\Base\Structure\HasDescription;
use App\Base\Structure\HasTitle;
use App\Base\Structure\Identify\HasIntId;
use Core\Base\Tests\UnitCase;
use Core\Services\Morph\Exceptions\MorphNotFound;
use Core\Services\Morph\Exceptions\NotUniqueMorph;
use Illuminate\Support\Carbon;
use Modules\Domain\Languages\Model\Language;
use Modules\Domain\Sentences\Model\Sentence;
use Modules\Domain\Sources\Structures\HasSource;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Internal\Container\Model\Container;
use Modules\Internal\Container\Model\HasContainer;
use Modules\Personal\User\Model\HasUser;
use Modules\Personal\User\Model\User;
use Modules\Personal\User\Model\User;

final class MorphTest extends UnitCase
{
    public function testMorphFound()
    {
        $class = new User();

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
