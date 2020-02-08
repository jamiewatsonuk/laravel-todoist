<?php

namespace Watson\Todoist;

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class Todoist
{
    protected TodoistClient $client;

    public function __construct(TodoistClient $client)
    {
        $this->client = $client;
    }

    public function projects() : Collection
    {
        return collect($this->client->getProjects())->transform(function ($project) {
            return new Project(
                $project['id'],
                $project['name'],
                $project['color'],
                $project['order'] ?? 0
            );
        })->sortBy('order');
    }

    public function tasks(int $projectId) : Collection
    {
        return collect($this->client->getTasks($projectId))->transform(function ($task) {
            return new Task(
                $task['id'],
                Arr::get($task, 'projectId'),
                $task['content'],
                ($due = Arr::get($task, 'due.date')) ? Carbon::createFromFormat('Y-m-d', $due) : null
            );
        });
    }
}
