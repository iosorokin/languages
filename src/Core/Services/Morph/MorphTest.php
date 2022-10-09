<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use App\Base\Entity\HasDescription;
use App\Base\Entity\HasTitle;
use App\Base\Entity\Identify\HasIntId;
use Core\Base\Tests\UnitCase;
use Illuminate\Support\Carbon;
use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Sentences\Entities\Sentence;
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

        $class = new class implements Sentence, Source {
            public function getText(): string {}
            public function setText(string $text): Sentence{}
            public function getUpdatedAt(): Carbon{}
            public function setTitle(?string $title): HasTitle{}
            public function getCreatedAt(): Carbon{}
            public function setType(SourceType $type): Source{}
            public function getTitle(): ?string{}
            public function setId(int $id): HasIntId{}
            public function getDescription(): ?string{}
            public function setDescription(?string $description): HasDescription{}
            public function getType(): SourceType{}
            public function setUser(User $user): HasUser{}
            public function getId(): int{}
            public function setContainer(Container $container): HasContainer{}
            public function getContainer(): Container{}
            public function setLanguage(Language $language): \Modules\Domain\Languages\Entities\HasLanguage{}
            public function getUser(): User{}
            public function getLanguage(): Language{}
        };

        Morph::getMorph($class::class);
    }
}
