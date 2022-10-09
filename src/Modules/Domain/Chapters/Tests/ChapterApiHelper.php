<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Tests;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;
use Modules\Domain\Sources\Entities\Source;
use Modules\Internal\Container\Tests\ContainerAppHelper;

final class ChapterApiHelper extends ApiHelper
{
    public function store(Source|int $source, array $overwrite = []): TestResponse
    {
        $attributes = ContainerAppHelper::new()->generateAttributes();
        $attributes += $overwrite;
        $response = $this->testCase->postJson(route('api.user.chapters.store', [
            'source_id' => is_int($source) ? $source : $source->getId()
        ]), $attributes);

        return $response;
    }
}
