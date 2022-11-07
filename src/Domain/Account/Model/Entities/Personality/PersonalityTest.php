<?php

declare(strict_types=1);

namespace Domain\Account\Model\Entities\Personality;

use App\Base\Tests\UnitCase;
use App\Values\Personality\Name\NameImp;

final class PersonalityTest extends UnitCase
{
    public function testOkComapare()
    {
        $name = $this->faker->name;
        $onePersonality = Personality::new(
            NameImp::new($name)
        );
        $twoPersonality = Personality::new(
            NameImp::new($name)
        );

        $this->assertTrue($onePersonality->compare($twoPersonality));
    }
}
