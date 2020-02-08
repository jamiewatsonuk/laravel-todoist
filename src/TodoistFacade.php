<?php

namespace Watson\Todoist;

use Illuminate\Support\Facades\Facade;

class TodoistFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-todoist';
    }
}
