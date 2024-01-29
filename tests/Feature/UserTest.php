<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;


class UserTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserWithoutLogin()
    {
        $response = $this->followingRedirects()->get('/home');
        $response->assertSeeText('登入');
        $response->assertStatus(200);
    }


    public function testLogin()
    {
        $response= $this->followingRedirects()->post('/login', [
            'email' => 'jeff87218@gmail.com','password' => '8569741d']);

        $response->assertStatus(200);
    }

    public function testUserTryAccessAdmin()
    {
        $user = User::find(2);

        $this->actingAs($user)
            ->get('/admin')
            ->assertStatus(403);
    }

    //TODO 其他測試
}
