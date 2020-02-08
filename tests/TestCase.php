<?php

namespace Watson\Todoist\Tests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Watson\Todoist\TodoistServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    use MockeryPHPUnitIntegration;

    protected function getPackageProviders($app) : array
    {
        return [
            TodoistServiceProvider::class,
        ];
    }
}
