<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Tests;

use Core\Base\Helpers\AppHelper;
use Modules\Domain\Analysis\Structures\Analysis;
use Modules\Domain\Analysis\Presenters\SeedAnalysis;
use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Personal\User\Structures\User;

final class AnalysisAppHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'translate' => $this->faker()->realText(),
            'description' => $this->faker()->realText()
        ];
    }

    public function create(User $user, Sentence $sentence, array $overwrite): Analysis
    {
        $attributes = $this->generateAttributes() + $overwrite;
        $attributes['sentence_id'] = $sentence->getId();
        /** @var SeedAnalysis $presenter */
        $presenter = app()->make(SeedAnalysis::class);

        return $presenter($user, $attributes);
    }
}
