<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use App\Base\Structures\HasDescription;
use App\Base\Structures\HasTitle;
use App\Base\Structures\Identify\HasIntId;
use Core\Base\Tests\UnitCase;
use Core\Services\Morph\Exceptions\MorphNotFound;
use Core\Services\Morph\Exceptions\NotUniqueMorph;
use Illuminate\Support\Carbon;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Domain\Sources\Structures\HasSource;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Internal\Container\Structures\Container;
use Modules\Internal\Container\Structures\HasContainer;
use Modules\Personal\User\Structures\HasUser;
use Modules\Personal\User\Structures\User;
use Modules\Personal\User\Structures\UserModel;

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
