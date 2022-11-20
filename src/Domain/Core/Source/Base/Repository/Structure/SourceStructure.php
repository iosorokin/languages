<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Repository\Structure;

use Carbon\Carbon;
use Domain\Core\Language\Base\Repository\Structure\LanguageStructure;

interface SourceStructure
{
    public function id(): int;

    public function student(): int;

    public function language(): LanguageStructure;

    public function title(): string;

    public function type(): string;

    public function description(): string;

    public function createdAt(): Carbon;
}
