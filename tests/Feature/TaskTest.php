<?php
namespace Tests\Feature;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
class TaskTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );
        $this->project = factory('App\Project')->create();
    }
    public function display_all_tasks()
    {
        $response = $this->get('api/task');
        $response->assertOk()
                ->assertSee(Task::all()->toJson());
    }
}
