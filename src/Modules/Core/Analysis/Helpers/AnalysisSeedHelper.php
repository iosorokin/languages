<?php

declare(strict_types=1);

namespace Modules\Core\Analysis\Helpers;

use Core\Base\Helpers\AppHelper;
use Modules\Core\Analysis\Model\Analysis;
use Modules\Core\Analysis\Presenters\SeedAnalysis;
use Modules\Core\Sentences\Model\Sentence;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

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
