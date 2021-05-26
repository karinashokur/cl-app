<?php
namespace Tests\Feature;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
class UnderTaskTest extends TestCase
{
    use DatabaseTransactions;
    public function setUp()
    {
        parent::setUp();
        Passport::actingAs(factory(User::class)->create());
    }
    public function create_an_undertask()
    {
        $task = factory('App\Task')->create();
        $underTask = factory('App\Task')->create();
        $response = $this->post('api/undertask/' . $task->id, $task->toArray());
        $response->assertOk()
                ->assertSee($underTask['name']);
    }
}
