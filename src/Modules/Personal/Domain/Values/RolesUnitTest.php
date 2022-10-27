<?php

declare(strict_types=1);

namespace Modules\Personal\Domain\Values;

use App\Extensions\Assert;
use Core\Base\Tests\UnitCase;

final class RolesUnitTest extends UnitCase
{
    private Roles $roles;

    protected function setUp(): void
    {
        parent::setUp();

        $this->roles = new Roles();
    }

    public function testAssignAsUser()
    {
        Assert::false($this->roles->isUser());
        $this->roles->assignAsUser();
        $this->assertTrue($this->roles->isUser());

        return $this->roles;
    }

    /**
     * @depends testAssignAsUser
     */
    public function testDemoteUser(Roles $roles)
    {
        $roles->demoteUser();
        $this->assertFalse($roles->isUser());
    }

    public function testAssignAsAdmin()
    {
        Assert::false($this->roles->isAdmin());
        $this->roles->assignAsAdmin();
        $this->assertTrue($this->roles->isAdmin());

        return $this->roles;
    }

    /**
     * @depends testAssignAsAdmin
     */
    public function testDemoteAdmin(Roles $roles)
    {
        $roles->demoteAdmin();
        $this->assertFalse($roles->isAdmin());
    }

    public function testAssignAsRoot()
    {
        Assert::false($this->roles->isRoot());
        $this->roles->assignAsRoot();
        $this->assertTrue($this->roles->isRoot());
    }

    public function testAssignMultipleRoles()
    {
        $this->roles->assignAsUser();
        $this->roles->assignAsAdmin();
        $this->roles->assignAsRoot();
        $this->assertTrue($this->roles->isUser());
        $this->assertTrue($this->roles->isAdmin());
        $this->assertTrue($this->roles->isRoot());

        return $this->roles;
    }

    /**
     * @depends testAssignMultipleRoles
     *
     */
    public function testDemoteMultipleRoles(Roles $roles)
    {
        $roles->demoteUser();
        $roles->demoteAdmin();
        $this->assertFalse($this->roles->isUser());
        $this->assertFalse($this->roles->isAdmin());
    }
}
