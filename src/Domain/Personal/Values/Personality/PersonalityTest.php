<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Personality;

use App\Base\Tests\UnitCase;
use Domain\Personal\Values\Personality\Name\UserName;

final class PersonalityTest extends UnitCase
{
    public function testOkComapare()
    {
        $name = $this->faker->name;
        $onePersonality = PersonalityImp::new(
            UserName::new($name)
        );
        $twoPersonality = PersonalityImp::new(
            UserName::new($name)
        );

        $this->assertTrue($onePersonality->compare($twoPersonality));
    }
}
