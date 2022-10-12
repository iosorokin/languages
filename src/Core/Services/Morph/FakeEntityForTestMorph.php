<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use App\Base\Structures\EloquentHasDescription;
use App\Base\Structures\EloquentHasTitle;
use App\Base\Structures\Identify\IntId;
use App\Base\Structures\Timestamps\Timestamps;
use Modules\Domain\Languages\Structures\EloquentLanguageRelation;
use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Domain\Sources\Structures\EloquentSourceRelation;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Internal\Container\Structures\EloquentHasContainerRelation;
use Modules\Personal\User\Structures\EloquentUserRelation;

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
