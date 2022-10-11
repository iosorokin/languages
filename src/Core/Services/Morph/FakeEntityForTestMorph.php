<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use App\Base\Entity\EloquentHasDescription;
use App\Base\Entity\EloquentHasTitle;
use App\Base\Entity\Identify\IntId;
use App\Base\Entity\Timestamps\Timestamps;
use Modules\Domain\Languages\Entities\EloquentLanguageRelation;
use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sources\Entities\EloquentSourceRelation;
use Modules\Domain\Sources\Entities\Source;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Internal\Container\Entites\EloquentHasContainerRelation;
use Modules\Personal\User\Entities\EloquentUserRelation;

final class FakeEntityForTestMorph implements Sentence, Source
{
    use IntId;
    use Timestamps;
    use EloquentSourceRelation;
    use EloquentUserRelation;
    use EloquentLanguageRelation;
    use Timestamps;
    use EloquentHasTitle;
    use EloquentHasDescription;
    use EloquentHasContainerRelation;

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }



    public function setType(SourceType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getType(): SourceType
    {
        return is_string($this->type) ? SourceType::tryFrom($this->type) : $this->type;
    }
}
