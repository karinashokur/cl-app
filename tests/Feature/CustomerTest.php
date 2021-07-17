<?php
namespace Tests\Feature;
use App\Customer;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
class CustomerTest extends TestCase
{
    use DatabaseTransactions;
    public function setUp()
    {
        parent::setUp();
        Passport::actingAs(factory(User::class)->create());
    }
    public function display_all_customers()
    {
        $response = $this->get('api/customer');
        $response->assertOk()
                ->assertSee(Customer::all()->first()->name);
    }
    public function display_a_customers()
    {
        $response = $this->get('api/customer/1');
        $response->assertOk()
                ->assertSee(Customer::first()->name);
    }
    public function create_a_customer()
    {
        $customer = factory('App\Customer')->make();
        $response = $this->post('api/customer', $customer->toArray());
        $response->assertOk()
                ->assertSee($customer['name']);
    }
    public function update_a_customer()
    {
        $customer = factory('App\Customer')->create();
        $response = $this->put('api/customer/' . $customer->id, ['name' => 'NewName']);
        $response->assertOk()
                ->assertSee('NewName');
    }
    public function delete_a_customers()
    {
        $customer = factory('App\Customer')->create();
        $response = $this->delete('api/customer/' . $customer->id);
        $response->assertStatus(204);
    }
}
