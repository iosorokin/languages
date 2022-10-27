<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Helpers;

use Core\Base\Helpers\AppHelper;
use Modules\Domain\Analysis\Model\Analysis;
use Modules\Domain\Analysis\Presenters\SeedAnalysis;
use Modules\Domain\Sentences\Model\Sentence;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

final class AnalysisSeedHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'translate' => $this->faker()->realText(),
            'description' => $this->faker()->realText()
        ];
    }

    public function create(EloquentUserModel $user, Sentence $sentence, array $overwrite): Analysis
    {
        $attributes = $this->generateAttributes() + $overwrite;
        $attributes['sentence_id'] = $sentence->getId();
        /** @var SeedAnalysis $presenter */
        $presenter = app()->make(SeedAnalysis::class);

        return $presenter($user, $attributes);
    }
}
