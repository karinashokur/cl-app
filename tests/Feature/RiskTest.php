<?php
namespace Tests\Feature;
use App\Risk;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
class RiskTest extends TestCase
{
    use DatabaseTransactions;
    public function setUp()
    {
        parent::setUp();
        Passport::actingAs(factory(User::class)->create());
    }
    public function display_all_risks()
    {
        $response = $this->get('api/risk');
        $response->assertOk()
                ->assertSee(Risk::first());
    }
    public function display_a_risk()
    {
        $response = $this->get('api/risk/1');
        $response->assertOk()
                ->assertSee(Risk::first()->name);
    }
    public function create_a_risk()
    {
        $risk = factory('App\Risk')->make();
        $response = $this->post('api/risk', $risk->toArray());
        $response->assertOk()
                ->assertSee($risk['name']);
    }
    public function update_a_risk()
    {
        $risk = factory('App\Risk')->create();
        $response = $this->put('api/risk/' . $risk->id, ['name' => 'NewName']);
        $response->assertOk()
                ->assertSee('NewName');
    }
    public function delete_a_risk()
    {
        $risk = factory('App\Risk')->create();
        $response = $this->delete('api/risk/' . $risk->id);
        $response->assertStatus(204);
    }
}
