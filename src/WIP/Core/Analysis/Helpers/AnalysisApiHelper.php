<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Helpers;

use App\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;
use WIP\Core\Sentences\Model\Sentence;

final class AnalysisApiHelper extends ApiHelper
{
    public function create(Sentence|int $sentence, array $overwrite = []): TestResponse
    {
        $attributes = AnalysisSeedHelper::new()->generateAttributes() + $overwrite;

        return $this->testCase->postJson(route('api.user.analysis.store', [
            'sentence_id' => is_int($sentence) ? $sentence : $sentence,
        ]), $attributes);
    }
}