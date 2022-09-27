<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Dto;

use App\Extensions\Assert;

final class CreateSentenceDto extends SentenceDto
{
    protected int $containerId;

    public function setContainerId(int $id): self
    {
        Assert::isNotSet($this, 'containerId');
        $this->containerId = $id;

        return $this;
    }

    public function getContainerId(): int
    {
        return $this->containerId;
    }
}
