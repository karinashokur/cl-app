<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
class ApiAuthTest extends TestCase
{
    use DatabaseTransactions;
    public function setUp()
    {
        parent::setUp();
        $this->response = $this->post('/api/register', [
            'name'      => 'user',
            'lastname'  => 'lastname',
            'email'     => 'user@user.com',
            'phone'     => '0612345678',
            'password'  => 'secret'
        ]);
    }
    public function api_create_user()
    {
        $this->response->assertOk();
    }
    public function api_login_user()
    {
        $this->response->assertOk()
                       ->assertSee('token');
    }
    public function api_connection_with_token()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . json_decode($this->response->getContent('token'))->accessToken
        ])->get('/api/auth/user');
        $response->assertOk()
                 ->assertSee('user@user.com');
    }
}
