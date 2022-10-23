<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Queries\Builder;

use App\Base\QueryBuilder\BaseSqlQueryBuilder;

abstract class BaseSourceQueryBuilderBase extends BaseSqlQueryBuilder implements SourceQueryBuilder
{
    public function whereUserId(int $id): self
    {
        $this->query->where('user_id', $id);

        return $this;
    }

    public function whereLanguageId(int $id): self
    {
        $this->query->where('language_id', $id);

        return $this;
    }
}
