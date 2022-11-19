<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Helpers;

use App\Base\Test\Helpers\ModuleHelper;
use Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Analysis\Model\Analysis;
use WIP\Core\Analysis\Presenters\SeedAnalysis;
use WIP\Core\Sentences\Model\Sentence;

final class AnalysisSeedHelper extends ModuleHelper
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
