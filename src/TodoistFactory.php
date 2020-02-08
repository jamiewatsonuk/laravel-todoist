<?php

namespace Watson\Todoist;

class TodoistFactory
{
    public static function make() : Todoist
    {
        $config = config('laravel-todoist');

        $client = new TodoistClient($config['accessToken']);

        return new Todoist($client);
    }
}
