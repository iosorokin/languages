<?php

declare(strict_types=1);

namespace Domain\Core\Analysis\Helpers;

use App\Base\Helpers\ApiHelper;
use Domain\Core\Sentences\Model\Sentence;
use Illuminate\Testing\TestResponse;

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
