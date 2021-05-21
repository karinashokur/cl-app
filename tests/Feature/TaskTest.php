<?php
namespace Tests\Feature;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
class TaskTest extends TestCase
{
    use DatabaseTransactions;
    public function setUp()
    {
        parent::setUp();
        Passport::actingAs(factory(User::class)->create());
    }
    public function display_all_tasks()
    {
        $response = $this->get('api/task');
        $response->assertOk()
                ->assertSee(Task::first()->undertasks->first()->name);
    }
    public function display_a_tasks()
    {
        $response = $this->get('api/task/1');
        $response->assertOk()
                ->assertSee(Task::first()->name);
    }
    public function create_a_tasks()
    {
        $task = factory('App\Task')->make();
        $response = $this->post('api/task', $task->toArray());
        $response->assertOk()
                ->assertSee($task['name']);
    }
    public function update_a_tasks()
    {
        $task = factory('App\Task')->create();
        $response = $this->put('api/task/' . $task->id, ['name' => 'NewName']);
        $response->assertOk()
                ->assertSee('NewName');
    }
    public function delete_a_tasks()
    {
        $task = factory('App\Task')->create();
        $response = $this->delete('api/task/' . $task->id);
        $response->assertStatus(204);
    }
}
