<?php

namespace Modules\Domain\Sentences\Structures;

interface HasSentence
{
    public function setSentence(Sentence $sentence): self;

    public function getSentenceId(): int;

    public function getSentence(): Sentence;
}
