<?php

<<<<<<< HEAD
class TestCase extends Illuminate\Foundation\Testing\TestCase
=======
abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
}
