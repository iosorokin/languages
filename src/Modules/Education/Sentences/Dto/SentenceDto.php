<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Dto;

use App\Extensions\Assert;

abstract class SentenceDto
{
    protected string $text;

    public function setText(string $text): static
    {
        Assert::isNotSet($this, 'text');
        $this->text = $text;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
