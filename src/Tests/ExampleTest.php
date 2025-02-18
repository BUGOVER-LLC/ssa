<?php

declare(strict_types=1);

namespace Tests;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(),
            $this->response->getContent()
        );
    }

    #[\Override] public function createApplication()
    {
        // TODO: Implement createApplication() method.
    }
}
