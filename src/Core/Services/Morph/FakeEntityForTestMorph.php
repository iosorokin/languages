<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use App\Base\Entity\HasDescription;
use Illuminate\Support\Carbon;
use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Entities\LanguageModel;
use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sources\Entities\Source;
use Modules\Domain\Sources\Entities\SourceModel;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Entites\ContainerModel;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Entities\UserModel;

final class FakeEntityForTestMorph implements Sentence, Source {

    public function getSource(): Source{
        return new SourceModel();
    }
    public function getSourceId(): int {
        return 1;
    }
    public function setSource(Source $source): self {
        return $this;
    }
    public function getText(): string {
        return '';
    }
    public function setText(string $text): self {
        return $this;
    }
    public function getUpdatedAt(): Carbon {
        return now();
    }
    public function setTitle(?string $title): self {
        return $this;
    }
    public function getCreatedAt(): Carbon{
        return now();
    }
    public function setType(SourceType $type): self {
        return $this;
    }
    public function getTitle(): ?string {
        return '';
    }
    public function setId(int $id): self {
        return $this;
    }
    public function getDescription(): ?string {
        return '';
    }
    public function setDescription(?string $description): HasDescription {
        return $this;
    }
    public function getType(): SourceType {
        return SourceType::Movie;
    }
    public function setUser(User $user): self {
        return $this;
    }
    public function getId(): int {
        return 1;
    }
    public function setContainer(Container $container): self {
        return $this;
    }
    public function getContainer(): Container {
        return new ContainerModel();
    }
    public function setLanguage(Language $language): self {
        return $this;
    }
    public function getUser(): User {
        return new UserModel();
    }
    public function getLanguage(): Language {
        new LanguageModel();
    }
}
