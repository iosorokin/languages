<?php

declare(strict_types=1);

namespace Domain\Personal\Entities;

use App\Base\Tests\UnitCase;
use App\Helpers\Test\PersonalSeedHelper;
use Domain\Personal\Factories\Personal\RegistrationFactory;

final class PersonaTest extends UnitCase
{
    public function testRegister()
    {
        $attributes = PersonalSeedHelper::new()->generateAttributes();
        /** @var RegistrationFactory $factory */
        $factory = $this->app->make(RegistrationFactory::class);
        $personal = $factory->new($attributes);
        $this->assertIsObject($personal);
    }
}
