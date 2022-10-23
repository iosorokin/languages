<?php

namespace Modules\Domain\Sources\Queries\Builder;

interface SourceQueryBuilder
{
    public function whereUserId(int $id): self;

    public function whereLanguageId(int $id): self;
}
