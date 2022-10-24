<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use Core\Base\Tests\UnitCase;
use Core\Services\Morph\Exceptions\MorphNotFound;
use Modules\Personal\User\Model\User;

final class MorphTest extends UnitCase
{
    public function testMorphFound()
    {
        $class = new User();

        $morph = Morph::getAlias($class);
        $this->assertSame('user', $morph);
    }

    public function testThrowIfMorphNotFound()
    {
        $this->expectException(MorphNotFound::class);

        $class = new class {};
        Morph::getAlias($class);
    }
}
