<?php
namespace Tests\Feature;
use App\Tariff;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
class TariffTest extends TestCase
{
    use DatabaseTransactions;
    public function setUp()
    {
        parent::setUp();
        Passport::actingAs(factory(User::class)->create());
    }
    public function display_all_tariffs()
    {
        $response = $this->get('api/tariff');
        $response->assertOk()
                ->assertSee(Tariff::all());
    }
    public function display_a_tariff()
    {
        $response = $this->get('api/tariff/1');
        $response->assertOk()
                ->assertSee(Tariff::first()->name);
    }
    public function create_a_tariff()
    {
        $tariff = factory('App\Tariff')->make();
        $response = $this->post('api/tariff', $tariff->toArray());
        $response->assertOk()
                ->assertSee($tariff['name']);
    }
    public function update_a_tariff()
    {
        $tariff = factory('App\Tariff')->create();
        $response = $this->put('api/tariff/' . $tariff->id, ['technical_level' => 2]);
        $response->assertOk()
                ->assertSee(2);
    }
    public function delete_a_tariff()
    {
        $risk = factory('App\Tariff')->create();
        $response = $this->delete('api/tariff/' . $risk->id);
        $response->assertStatus(204);
    }
}
