<?php
namespace Tests\Feature;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
class UserTest extends TestCase
{
    use DatabaseTransactions;
    private $user;
    public function setUp()
    {
        parent::setUp();
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );
    }
    public function display_all_users()
    {
        $response = $this->get('api/user');
        $response->assertOk()
                ->assertSee(User::all()->toJson());
    }
    public function display_one_user()
    {
        $response = $this->get('api/user/1');
        $response->assertOk()
                ->assertSee(User::first()->toJson());
    }
    public function update_one_user()
    {
        $response = $this->put('api/user/1', [
            'name' => 'newName'
        ]);
        $response->assertOk()
                ->assertSee('newName');
    }
    public function delete_one_user_with_project_and_company()
    {
        $response = $this->delete('api/user/1');
        $response->assertStatus(401);
    }
    public function delete_one_user_with_company()
    {
        $user = User::first();
        $user->projects->first()->delete();
        $response = $this->delete('api/user/1');
        $response->assertStatus(401);
    }
    public function delete_one_user_with_project()
    {
        $user = User::first();
        $user->ownedCompanies->first()->delete();
        $response = $this->delete('api/user/1');
        $response->assertStatus(401);
    }
    public function delete_one_user_without_project_and_company()
    {
        $user = User::first();
        $user->ownedCompanies()->first()->delete();
        $user->projects->first()->delete();
        $response = $this->delete('api/user/1');
        $response->assertStatus(204);
    }
}
