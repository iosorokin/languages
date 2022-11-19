<?php

declare(strict_types=1);

namespace Infrastructure\Services\Morph;

use App\Base\Test\UnitCase;
use Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use Infrastructure\Services\Morph\Exceptions\MorphNotFound;

final class MorphTest extends UnitCase
{
    public function testMorphFound()
    {
        $class = new EloquentUserModel();

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
