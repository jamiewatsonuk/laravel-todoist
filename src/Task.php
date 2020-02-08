<?php

namespace Watson\Todoist;

use Carbon\Carbon;

class Task
{
    public int $id;

    public ?int $projectId;

    public string $title;

    public ?Carbon $date;

    public function __construct(int $id, ?int $projectId, string $title, ?Carbon $date)
    {
        $this->id = $id;
        $this->projectId = $projectId;
        $this->title = $title;
        $this->date = $date;
    }
}
