<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;


class AdminTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminWithoutLogin()
    {
        $response = $this->get('/admin');

        $response->assertStatus(403);
    }


    public function testLogin()
    {
        $response= $this->followingRedirects()->post('/login', [
            'email' => 'admin@admin.com','password' => 'admin']);

        $response->assertStatus(200);
    }

    public function testAdminLogin()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->get('/admin')
            ->assertStatus(200);
    }

    public function testPermissionList()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->get('/admin/permission')
            ->assertStatus(200);
    }

    public function testAddUserPage()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->get('/admin/addUserPage')
            ->assertStatus(200);
    }

    public function testAddUser()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->followingRedirects()->post('/admin/addUser', ['name'=>'測試001',
                'email' => 'test001@test001.com','password' => 'test001','password-confirm'=>'test001'])
            ->assertStatus(200);
    }

    public function testUpdateUser()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->followingRedirects()->post('/admin/updateUser', ['name'=>'測試001',
                'email' => 'test001@test001.com','password' => 'test001','password-confirm'=>'test001'])
            ->assertStatus(200);
    }

    public function testDeleteUser()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->followingRedirects()->post('/admin/deleteUser', ['id'=>'2'])
            ->assertStatus(200);
    }

    public function testFindUser()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->followingRedirects()->post('/admin/deleteUser', ['keyword'=>'findUser'])
            ->assertStatus(200);
    }

    public function testShowCurtainInfo()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->followingRedirects()->get('/admin/showCurtainPermissionInfo/1')
            ->assertStatus(200);
    }
    public function testCurtainPermissionDelete()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->followingRedirects()->get('/admin/CurtainPermissionDelete/1')
            ->assertStatus(200);
    }

    public function testAddCurtainPermission()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->followingRedirects()->post('/admin/addCurtainPermission', ['user_id'=>'1','building'=>'1','room'=>'1','room_count'=>'2'])
            ->assertStatus(200);
    }

    public function testFindCurtainPermission()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->followingRedirects()->post('/admin/findCurtainPermission', ['keyword'=>'老闆'])
            ->assertStatus(200);
    }

    public function testBuildingInfo()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->followingRedirects()->get('/admin/building')
            ->assertStatus(200);
    }

    public function testCreateBuilding()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->followingRedirects()->post('/admin/findCurtainPermission', ['building_name'=>'A棟-建築物','floor'=>'1','room_number'=>'101'])
            ->assertStatus(200);
    }
}
