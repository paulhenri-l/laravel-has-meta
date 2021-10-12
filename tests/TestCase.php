<?php

namespace PaulhenriL\LaravelHasMeta\Tests;

use PaulhenriL\LaravelHasMeta\Tests\Concerns\ManagesDatabase;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use ManagesDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->freshSchema();
    }
}
