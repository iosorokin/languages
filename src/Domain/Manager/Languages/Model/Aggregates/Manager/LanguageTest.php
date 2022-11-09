<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Aggregates\Manager;

use App\Base\Tests\UnitCase;
use App\Exceptions\DomainAuthorizationException;
use Domain\Core\Languages\Model\Aggregates\Manager\LanguageAuthorization;
use Domain\Manager\Languages\Tests\LanguageManagerModuleHelper;

final class LanguageTest extends UnitCase
{
    public function testCreate()
    {
        $helper = LanguageManagerModuleHelper::new();
        $factory = $helper->factory();
        $language = $factory->new($helper->getCreateLanguageCommand());
        $this->assertInstanceOf(ManagerLanguage::class, $language);
    }

    public function testOkCheckOwner()
    {
        $this->mock(LanguageAuthorization::class)
            ->shouldReceive('checkRoot')
            ->andReturnNull();
        $helper = LanguageManagerModuleHelper::new();
        $factory = $helper->factory();
        $language = $factory->new($helper->getCreateLanguageCommand());
        $language->checkOwner(app(LanguageAuthorization::class));
        $this->assertTrue(true);
    }

    public function testFailCheckOwner()
    {
        $this->expectException(DomainAuthorizationException::class);

        $this->mock(LanguageAuthorization::class)
            ->shouldReceive('checkRoot')
            ->andThrowExceptions([new DomainAuthorizationException]);
        $helper = LanguageManagerModuleHelper::new();

        $factory = $helper->factory();
        $language = $factory->new($helper->getCreateLanguageCommand());
        $language->checkOwner(app(LanguageAuthorization::class));
    }
}
