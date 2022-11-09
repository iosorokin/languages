<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Tests\Module;

use App\Base\Tests\ModuleCase;
use App\Roles\ContentManager;
use App\Values\Identificatiors\Id\BigIntId;
use App\Values\Identificatiors\Id\IntId;
use Domain\Core\Languages\LanguageModuleProd;
use Domain\Core\Languages\Repositories\LanguageRepository;
use Domain\Core\Languages\Tests\LanguageSeedHelper;
use Mockery\MockInterface;

final class LanguageModuleDeleteTest extends ModuleCase
{
    private LanguageModuleProd $languageModule;

    private ContentManager $manager;

    private int $deletingLanguageId;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->managerDelete($this->manager, $this->deletingLanguageId);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->languageModule = $this->app->make(LanguageModuleProd::class);
        $this->manager = new class implements ContentManager {
            public function id(): IntId
            {
                return BigIntId::new(random_int(1, 10000));
            }

            public function isRoot(): bool
            {
                return false;
            }
        };

        $language = LanguageSeedHelper::new()->create();
        $this->deletingLanguageId = $language->id()->toInt();
        $this->mock(LanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('delete')
                ->andReturnNull();
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
