<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Accesses;

use App\Base\Tests\UnitCase;
use App\Extensions\Assert;

final class AccessesTest extends UnitCase
{
    public function testAssignAsUser()
    {
        $roles = AccessesImp::new();
        Assert::false($roles->isUser());
        $roles->addAccess(Access::User);
        $this->assertTrue($roles->isUser());

        return $roles;
    }

    /**
     * @depends testAssignAsUser
     */
    public function testDemoteUser(AccessesImp $roles)
    {
        $roles->deleteAccess(Access::User);
        $this->assertFalse($roles->isUser());
    }

    public function testAssignAsAdmin()
    {
        $roles = AccessesImp::new();
        Assert::false($roles->isAdmin());
        $roles->addAccess(Access::Admin);
        $this->assertTrue($roles->isAdmin());

        return $roles;
    }

    /**
     * @depends testAssignAsAdmin
     */
    public function testDemoteAdmin(AccessesImp $roles)
    {
        $roles->deleteAccess(Access::Admin);
        $this->assertFalse($roles->isAdmin());
    }

    public function testAssignAsRoot()
    {
        $roles = AccessesImp::new();
        $roles->addAccess(Access::Root);
        $this->assertTrue($roles->isRoot());
    }

    public function testCanNotAssignAsRoot()
    {
        $roles = AccessesImp::new();
        $roles->addAccess(Access::Root);
        $this->assertTrue($roles->isRoot());
    }

    public function testAssignMultipleRoles()
    {
        $roles = AccessesImp::new();
        $roles->addAccess(Access::User);
        $roles->addAccess(Access::Admin);
        $roles->addAccess(Access::Root);
        $this->assertTrue($roles->isUser());
        $this->assertTrue($roles->isAdmin());
        $this->assertTrue($roles->isRoot());

        return $roles;
    }

    /**
     * @depends testAssignMultipleRoles
     */
    public function testDemoteMultipleRoles(AccessesImp $roles)
    {
        $roles->deleteAccess(Access::User);
        $roles->deleteAccess(Access::Admin);
        $roles->deleteAccess(Access::Root);
        $this->assertFalse($roles->isUser());
        $this->assertFalse($roles->isAdmin());
        $this->assertFalse($roles->isRoot());
    }
}
