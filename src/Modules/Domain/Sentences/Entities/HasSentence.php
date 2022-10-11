<?php

namespace Modules\Domain\Sentences\Entities;

interface HasSentence
{
    public function setSentence(Sentence $sentence): self;

    public function getSentenceId(): int;

    public function getSentence(): Sentence;
}
