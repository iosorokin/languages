<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use App\Base\Entity\EloquentHasDescription;
use App\Base\Entity\EloquentHasTitle;
use App\Base\Entity\HasDescription;
use App\Base\Entity\HasTitle;
use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Core\Base\Tests\UnitCase;
use Illuminate\Support\Carbon;
use Modules\Container\Entites\Container;
use Modules\Container\Entites\EloquentHasContainerRelation;
use Modules\Container\Entites\HasContainer;
use Modules\Education\Dictionary\Entities\Dictionary;
use Modules\Education\Rules\Entities\Rule;
use Modules\Education\Sentences\Entities\Sentence;
use Modules\Personal\User\Entities\EloquentUserRelation;
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

        $class = new class implements Rule, Dictionary {
            public function setId(int $id): \App\Base\Entity\Identify\HasIntId {}
            public function getTitle(): ?string {}
            public function setTitle(?string $title): \App\Base\Entity\HasTitle {}
            public function getUser(): User {}
            public function setUser(User $user): \Modules\Personal\User\Entities\HasUser {}
            public function getDescription(): ?string {}
            public function setDescription(?string $description): \App\Base\Entity\HasDescription {}
            public function getCreatedAt(): Carbon {}
            public function getId(): int {}
            public function getUpdatedAt(): Carbon {}
            public function getContainer(): Container {}
            public function setContainer(Container $container): \Modules\Container\Entites\HasContainer {}
        };
        Morph::getMorph($class::class);
    }
}
