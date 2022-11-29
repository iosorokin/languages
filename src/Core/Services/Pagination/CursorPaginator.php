<?php

declare(strict_types=1);

namespace Core\Infrastructure\Services\Pagination;

use Illuminate\Contracts\Pagination\CursorPaginator as EloquentCursorPaginator;

final class CursorPaginator extends Paginator
{
    protected string $path;

    protected int $perPage;

    protected ?string $cursor;

    protected ?string $nextCursor;

    protected ?string $nextCursorUrl;

    protected ?string $prevCursor;

    protected ?string $prevCursorUrl;

    public function __construct(EloquentCursorPaginator $paginator)
    {
        $this->path = $paginator->path();
        $this->perPage = $paginator->perPage();
        $this->cursor = $paginator->cursor()?->encode();
        $this->nextCursor = $paginator->nextCursor()?->encode();
        $this->nextCursorUrl = $paginator->nextPageUrl();
        $this->prevCursor = $paginator->previousCursor()?->encode();
        $this->prevCursorUrl = $paginator->previousPageUrl();
    }
}
