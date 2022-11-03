<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Personality;

use App\Base\Tests\UnitCase;
use App\Values\Personality\Name\NameImp;

final class PersonalityTest extends UnitCase
{
    public function testOkComapare()
    {
        $name = $this->faker->name;
        $onePersonality = PersonalityImp::new(
            NameImp::new($name)
        );
        $twoPersonality = PersonalityImp::new(
            NameImp::new($name)
        );

        $this->assertTrue($onePersonality->compare($twoPersonality));
    }
}
