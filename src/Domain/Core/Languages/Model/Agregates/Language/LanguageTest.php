<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Agregates\Language;

use App\Base\Tests\UnitCase;
use App\Exceptions\DomainAuthorizationException;
use Domain\Core\Languages\Authorization\LanguageAuthorization;
use Domain\Core\Languages\Helpers\Test\LanguageSeedHelper;
use Illuminate\Auth\Access\AuthorizationException;

final class LanguageTest extends UnitCase
{
    public function testCreate()
    {
        $helper = LanguageSeedHelper::new();
        $factory = $helper->factory();
        $language = $factory->new($helper->createDto());
        $this->assertInstanceOf(Language::class, $language);
    }

    public function testOkCheckOwner()
    {
        $this->mock(LanguageAuthorization::class)
            ->shouldReceive('checkRoot')
            ->andReturnNull();
        $helper = LanguageSeedHelper::new();
        $factory = $helper->factory();
        $language = $factory->new($helper->createDto());
        $language->checkOwner(app(LanguageAuthorization::class));
        $this->assertTrue(true);
    }

    public function testFailCheckOwner()
    {
        $this->expectException(DomainAuthorizationException::class);

        $this->mock(LanguageAuthorization::class)
            ->shouldReceive('checkRoot')
            ->andThrowExceptions([new DomainAuthorizationException]);
        $helper = LanguageSeedHelper::new();

        $factory = $helper->factory();
        $language = $factory->new($helper->createDto());
        $language->checkOwner(app(LanguageAuthorization::class));
    }
}
