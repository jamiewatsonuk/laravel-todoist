<?php

namespace Watson\Todoist;

class Project
{
    public int $id;

    public int $order;

    public int $color;

    public string $name;

    public function __construct(int $id, string $name, int $color, int $order)
    {
        $this->id = $id;
        $this->name = $name;
        $this->color = $color;
        $this->order = $order;
    }
}
