<?php

namespace Watson\Todoist\Tests\Unit;

use Watson\Todoist\Task;
use Watson\Todoist\Tests\TestCase;
use Watson\Todoist\Todoist;
use Watson\Todoist\TodoistClient;
use Watson\Todoist\TodoistFactory;

class TodoistTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiated()
    {
        $this->assertInstanceOf(Todoist::class, TodoistFactory::make());
    }

    /** @test */
    public function it_returns_a_collection_of_tasks()
    {
        $mock = \Mockery::mock(TodoistClient::class);
        $mock->shouldReceive('getTasks')->once()->andReturn([
            ['id' => 1, 'projectId' => 1, 'content' => "Put the hoover round"],
            ['id' => 2, 'projectId' => 1, 'content' => "Wipe the kitchen sides"],
            ['id' => 3, 'projectId' => 1, 'content' => "Do the dishes"],
            ['id' => 3, 'projectId' => 1, 'content' => "Do the dishes", 'due' => ['date' => '2020-02-07']],
        ]);

        $todoist = new Todoist($mock);

        $tasks = $todoist->tasks(1);

        $this->assertCount(4, $tasks);
        $tasks->each(function ($task) {
            $this->assertInstanceOf(Task::class, $task);
        });
    }
}
